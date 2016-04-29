int leftForward = 3;
int leftBackward = 4;
int rightForward = 6;
int rightBackward = 7;
int enablePin = 5;
char state;
int flag = 0;
 
void setup() {

    pinMode(leftForward, OUTPUT);
    pinMode(leftBackward, OUTPUT);
    pinMode(rightForward, OUTPUT);
    pinMode(rightBackward, OUTPUT);
    pinMode(enablePin, OUTPUT);

    digitalWrite(enablePin, HIGH);

    Serial.begin(9600);
}
 
void loop() 
{

    if(Serial.available() > 0)
    {     
      state = Serial.read();   
      flag=0;
    }  
    
    if (state == '1') 
    {
        digitalWrite(leftForward, HIGH);
        digitalWrite(leftBackward, LOW);
        digitalWrite(rightForward, LOW);
        digitalWrite(rightBackward, HIGH);
    }
    else if (state == '2') 
    {
        digitalWrite(leftForward, LOW);
        digitalWrite(leftBackward, HIGH);
        digitalWrite(rightForward, HIGH);
        digitalWrite(rightBackward, LOW);
    }
    else if (state == '3')
    {
        digitalWrite(leftForward, HIGH);
        digitalWrite(leftBackward, LOW);
        digitalWrite(rightForward, HIGH);
        digitalWrite(rightBackward, LOW);
    }
    else if (state == '4') 
    {
        digitalWrite(leftForward, LOW);
        digitalWrite(leftBackward, HIGH);
        digitalWrite(rightForward, LOW);
        digitalWrite(rightBackward, HIGH);
    }
 }
