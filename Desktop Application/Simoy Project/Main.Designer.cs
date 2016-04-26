namespace Simoy_Project
{
    partial class frm_Main
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(frm_Main));
            this.dgv_CurrentData = new System.Windows.Forms.DataGridView();
            this.toolStrip1 = new System.Windows.Forms.ToolStrip();
            this.toolStripLabel1 = new System.Windows.Forms.ToolStripLabel();
            this.txt_Api = new System.Windows.Forms.ToolStripTextBox();
            this.toolStripLabel2 = new System.Windows.Forms.ToolStripLabel();
            this.cmb_Ports = new System.Windows.Forms.ToolStripComboBox();
            this.btn_ConnectGSM = new System.Windows.Forms.ToolStripButton();
            this.col_Publish = new System.Windows.Forms.DataGridViewButtonColumn();
            this.col_temp = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_hum = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_mq2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_mq5 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_dust = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_code = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.col_timestamp = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dgv_CurrentData)).BeginInit();
            this.toolStrip1.SuspendLayout();
            this.SuspendLayout();
            // 
            // dgv_CurrentData
            // 
            this.dgv_CurrentData.AllowUserToAddRows = false;
            this.dgv_CurrentData.AllowUserToDeleteRows = false;
            this.dgv_CurrentData.AllowUserToResizeColumns = false;
            this.dgv_CurrentData.AllowUserToResizeRows = false;
            this.dgv_CurrentData.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgv_CurrentData.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.DisableResizing;
            this.dgv_CurrentData.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.col_Publish,
            this.col_temp,
            this.col_hum,
            this.col_mq2,
            this.col_mq5,
            this.col_dust,
            this.col_code,
            this.col_timestamp});
            this.dgv_CurrentData.Location = new System.Drawing.Point(0, 28);
            this.dgv_CurrentData.Name = "dgv_CurrentData";
            this.dgv_CurrentData.ReadOnly = true;
            this.dgv_CurrentData.RowHeadersWidthSizeMode = System.Windows.Forms.DataGridViewRowHeadersWidthSizeMode.AutoSizeToAllHeaders;
            this.dgv_CurrentData.Size = new System.Drawing.Size(861, 458);
            this.dgv_CurrentData.TabIndex = 2;
            this.dgv_CurrentData.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgv_CurrentData_CellContentClick);
            // 
            // toolStrip1
            // 
            this.toolStrip1.GripStyle = System.Windows.Forms.ToolStripGripStyle.Hidden;
            this.toolStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripLabel1,
            this.txt_Api,
            this.toolStripLabel2,
            this.cmb_Ports,
            this.btn_ConnectGSM});
            this.toolStrip1.Location = new System.Drawing.Point(0, 0);
            this.toolStrip1.Name = "toolStrip1";
            this.toolStrip1.Size = new System.Drawing.Size(861, 25);
            this.toolStrip1.TabIndex = 3;
            this.toolStrip1.Text = "toolStrip1";
            // 
            // toolStripLabel1
            // 
            this.toolStripLabel1.Name = "toolStripLabel1";
            this.toolStripLabel1.Size = new System.Drawing.Size(84, 22);
            this.toolStripLabel1.Text = "API Permalink:";
            // 
            // txt_Api
            // 
            this.txt_Api.Name = "txt_Api";
            this.txt_Api.Size = new System.Drawing.Size(100, 25);
            // 
            // toolStripLabel2
            // 
            this.toolStripLabel2.Name = "toolStripLabel2";
            this.toolStripLabel2.Size = new System.Drawing.Size(60, 22);
            this.toolStripLabel2.Text = "GSM Port:";
            // 
            // cmb_Ports
            // 
            this.cmb_Ports.Name = "cmb_Ports";
            this.cmb_Ports.Size = new System.Drawing.Size(121, 25);
            // 
            // btn_ConnectGSM
            // 
            this.btn_ConnectGSM.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.btn_ConnectGSM.Image = ((System.Drawing.Image)(resources.GetObject("btn_ConnectGSM.Image")));
            this.btn_ConnectGSM.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.btn_ConnectGSM.Name = "btn_ConnectGSM";
            this.btn_ConnectGSM.Size = new System.Drawing.Size(84, 22);
            this.btn_ConnectGSM.Text = "Connect GSM";
            this.btn_ConnectGSM.Click += new System.EventHandler(this.btn_ConnectGSM_Click);
            // 
            // col_Publish
            // 
            this.col_Publish.HeaderText = "Upload";
            this.col_Publish.Name = "col_Publish";
            this.col_Publish.ReadOnly = true;
            this.col_Publish.Resizable = System.Windows.Forms.DataGridViewTriState.True;
            this.col_Publish.SortMode = System.Windows.Forms.DataGridViewColumnSortMode.Automatic;
            // 
            // col_temp
            // 
            this.col_temp.HeaderText = "Temperature";
            this.col_temp.Name = "col_temp";
            this.col_temp.ReadOnly = true;
            // 
            // col_hum
            // 
            this.col_hum.HeaderText = "Humidity";
            this.col_hum.Name = "col_hum";
            this.col_hum.ReadOnly = true;
            // 
            // col_mq2
            // 
            this.col_mq2.HeaderText = "MQ 2";
            this.col_mq2.Name = "col_mq2";
            this.col_mq2.ReadOnly = true;
            // 
            // col_mq5
            // 
            this.col_mq5.HeaderText = "MQ 5";
            this.col_mq5.Name = "col_mq5";
            this.col_mq5.ReadOnly = true;
            // 
            // col_dust
            // 
            this.col_dust.HeaderText = "Dust Density";
            this.col_dust.Name = "col_dust";
            this.col_dust.ReadOnly = true;
            // 
            // col_code
            // 
            this.col_code.HeaderText = "Serial Number";
            this.col_code.Name = "col_code";
            this.col_code.ReadOnly = true;
            // 
            // col_timestamp
            // 
            this.col_timestamp.HeaderText = "Timestamp";
            this.col_timestamp.Name = "col_timestamp";
            this.col_timestamp.ReadOnly = true;
            // 
            // frm_Main
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(861, 488);
            this.Controls.Add(this.toolStrip1);
            this.Controls.Add(this.dgv_CurrentData);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Name = "frm_Main";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Simoy Project";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.frm_Main_FormClosing);
            this.Load += new System.EventHandler(this.frm_Main_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgv_CurrentData)).EndInit();
            this.toolStrip1.ResumeLayout(false);
            this.toolStrip1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DataGridView dgv_CurrentData;
        private System.Windows.Forms.ToolStrip toolStrip1;
        private System.Windows.Forms.ToolStripComboBox cmb_Ports;
        private System.Windows.Forms.ToolStripButton btn_ConnectGSM;
        private System.Windows.Forms.ToolStripLabel toolStripLabel1;
        private System.Windows.Forms.ToolStripTextBox txt_Api;
        private System.Windows.Forms.ToolStripLabel toolStripLabel2;
        private System.Windows.Forms.DataGridViewButtonColumn col_Publish;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_temp;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_hum;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_mq2;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_mq5;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_dust;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_code;
        private System.Windows.Forms.DataGridViewTextBoxColumn col_timestamp;


    }
}

