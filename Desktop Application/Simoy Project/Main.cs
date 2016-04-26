using System;
using System.IO.Ports;
using System.Windows.Forms;
using GsmComm.GsmCommunication;
using GsmComm.Interfaces;
using GsmComm.PduConverter;
using GsmComm.Server;
using System.Net;

namespace Simoy_Project
{
    public partial class frm_Main : Form
    {
        public frm_Main()
        {
            InitializeComponent();
            //sample data
            dgv_CurrentData.Rows.Add("Upload", "10", "25", "300", "151", "35", "SDK20155", DateTime.Now.ToString("h:mm:ss tt"));
        }

        GsmCommMain gsm;
        DecodedShortMessage[] messages;
        int connectionStatus = 0;
        string actual_SMS;
        private void frm_Main_Load(object sender, EventArgs e)
        {
            foreach(string port in SerialPort.GetPortNames()){
                cmb_Ports.Items.Add(port);
            }
            cmb_Ports.Text = SerialPort.GetPortNames()[0];
        }

        private void btn_ConnectGSM_Click(object sender, EventArgs e)
        {
            // Start GSM Listening
            try
            {
                if (connectionStatus == 0)
                {
                    gsm = new GsmCommMain(cmb_Ports.Text, 9600, 100);
                    gsm.Open();
                    gsm.EnableMessageNotifications();
                    gsm.MessageReceived += new MessageReceivedEventHandler(msg_onReceived);
                    cmb_Ports.Enabled = false;
                    txt_Api.Enabled = false;
                    btn_ConnectGSM.Text = "Disconnect";
                    connectionStatus = 1;
                }
                else
                {
                    gsm.Close();
                    cmb_Ports.Enabled = true;
                    txt_Api.Enabled = true;
                    btn_ConnectGSM.Text = "Connect GSM";
                    connectionStatus = 0;
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(this,"Error Occured: "+ex.Message,"Simoy Project");
            }
        }

        private void msg_onReceived(object sender, MessageReceivedEventArgs e)
        {
            messages = gsm.ReadMessages(PhoneMessageStatus.All, PhoneStorageType.Phone);
            try
            {
                actual_SMS = messages[messages.Length - 1].Data.UserDataText;
            }
            catch { }
            
            msg_onMessage(actual_SMS);
        }
        bool isInvoked = false;

        private void msg_onMessage(string actual_SMS)
        {
            //Receiver: 639753349196
            if (isInvoked == false)
            {
                parseData(actual_SMS);
                isInvoked = true;
            }
        }
        string[] param;
        int temp, hum, gas_CO, gas_Meth, dust;
        string code, url;
        private void parseData(string data)
        {
            // 0 - 1023
            // Data Structure   : Temp Hum Gas_CO Gas_Meth Dust SERIAL_CODE
            // Data Sample      : 255 500 200 300 600 1022 SDK20166
            if (data != null && data.Contains(" "))
            {
                try
                {
                    param = data.Split(' ');
                    if (param.Length == 5)
                    {
                        //Raw
                        temp    = int.Parse(param[0]);
                        hum     = int.Parse(param[1]);
                        gas_CO  = int.Parse(param[2]);
                        gas_Meth= int.Parse(param[3]);
                        dust    = int.Parse(param[4]);
                        code = param[5];
                        
                        dgv_CurrentData.Rows.Add(false,temp, hum, gas_CO, gas_Meth, dust, code, DateTime.Now.ToString("h:mm:ss tt")); //Raw Data
                        
                        if (messages.Length > 10)
                        {
                            gsm.DeleteMessages(DeleteScope.All, PhoneStorageType.Sim);
                        }
                    }
                    else
                    {
                        MessageBox.Show("Received but invalid structure. Data:"+data);
                    }
                }
                catch (Exception ex) { }
            }
            else
            {
                MessageBox.Show("Received but invalid structure. Data:" + data);
            }
        }

        private void frm_Main_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (connectionStatus == 1)
            {
                try
                {
                    gsm.Close();
                }
                catch{}
            }
            Application.Exit();
        }

        private void dgv_CurrentData_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            //string x= dgv_CurrentData.Rows[0].Cells[1].Value.ToString();
            //MessageBox.Show(x);
            if (e.ColumnIndex == 0)
            {
                upload(dgv_CurrentData.Rows[e.RowIndex].Cells[1].Value.ToString(), dgv_CurrentData.Rows[e.RowIndex].Cells[2].Value.ToString(), dgv_CurrentData.Rows[e.RowIndex].Cells[3].Value.ToString(), dgv_CurrentData.Rows[e.RowIndex].Cells[4].Value.ToString(), dgv_CurrentData.Rows[e.RowIndex].Cells[5].Value.ToString(), dgv_CurrentData.Rows[e.RowIndex].Cells[6].Value.ToString());
            }
        }
        WebClient client = new WebClient();
        private void upload(string t_temp, string t_hum, string t_gas_CO, string t_gas_Meth, string t_dust, string code)
        {
            if (txt_Api.Text != "")
            {
                this.url = txt_Api.Text + "&object={\"temp\":\"" + t_temp + "\",\"hum\":\"" + t_hum + "\",\"mq2\":\"" + t_gas_CO + "\",\"mq5\":\"" + t_gas_Meth + "\",\"dust\":\"" + t_dust + "\",\"code\":\"" + code + "\"}";
                try
                {
                    client.DownloadString(this.url);
                    //MessageBox.Show("Success: "+this.url);
                }
                catch(Exception ex)
                {
                    MessageBox.Show("Upload Failed: "+ex.Message);
                }
            }
            else
            {
                MessageBox.Show("Please provide API Permalink", "Simoy Project");
            }
        }
    }
}
