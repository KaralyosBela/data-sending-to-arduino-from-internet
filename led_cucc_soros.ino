#include <Wire.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE); //Lcd inicializálása
const int rgb_led_red = A0;
const int rgb_led_green = A1;
const int rgb_led_blue = A2;
char *utasitasok[20]; //Itt adjuk megy hány utasítást szeretnénk tárolni.
char *pointer = NULL;
int index = 0;

void setup() {
  Serial.begin(9600);
  lcd.begin(16, 2);
  pinMode(rgb_led_red, OUTPUT);
  pinMode(rgb_led_green, OUTPUT);
  pinMode(rgb_led_blue, OUTPUT);
  Serial.setTimeout(100);
}

void loop() {

  if (Serial.available() > 0) {
    String utasitasString = Serial.readString();
    utasitasString.trim();
    //lcd.clear();
    //lcd.print(utasitasString);

    char utasitas_array[utasitasString.length()];
    utasitasString.toCharArray(utasitas_array, utasitasString.length() + 1);
    pointer = strtok(utasitas_array, " ");
    while (pointer != NULL)
    {
      utasitasok[index] = pointer;
      /*lcd.clear();
        lcd.print(utasitasok[index]);*/
      //delay(1000);
      index++;
      pointer = strtok(NULL, " ");
    }

    //Serial.println(utasitasString);
    String rgb_red = utasitasok[0];
    String rgb_green = utasitasok[1];
    String rgb_blue = utasitasok[2];
    String lcd_text = utasitasok[3];

    if (rgb_red.equals("1")) {
      digitalWrite(rgb_led_red, HIGH);
      Serial.println("PIROS ON");
    }
    if (rgb_red.equals("0")) {
      digitalWrite(rgb_led_red, LOW);
      Serial.println("PIROS OFF");
    }
    if (rgb_green.equals("1")) {
      digitalWrite(rgb_led_green, HIGH);
      Serial.println("ZOLD ON");
    }
    if (rgb_green.equals("0")) {
      digitalWrite(rgb_led_green, LOW);
      Serial.println("ZOLD OFF");
    }
    if (rgb_blue.equals("1")) {
      digitalWrite(rgb_led_blue, HIGH);
      Serial.println("KEK ON");
    }
    if (rgb_blue.equals("0")) {
      digitalWrite(rgb_led_blue, LOW);
      Serial.println("KEK OFF");
    }
  }
}







