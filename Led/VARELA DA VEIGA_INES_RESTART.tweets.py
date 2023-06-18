from machine import Pin,PWM
import network   #import des fonction lier au wifi
import urequests	#import des fonction lier au requetes http
import utime	#import des fonction lier au temps
import ujson	#import des fonction lier aà la convertion en Json

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'iPhone de Inès'
password = 'telecommande'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://192.168.1.137/php/projet/index.php"

#dictionnaire avec couleur

tweet_colour = {
    "red": (255, 0, 0),
    "green": (0, 255, 0), 
    "blue": (0, 0, 255), 
}



#afficher la led de la couleur correspondant au tweet
leds = [PWM(Pin(16, Pin.OUT)), PWM(Pin(17, Pin.OUT)), PWM(Pin(18, Pin.OUT))]

#déclaration bouton
pin_button = Pin(14, mode=Pin.IN, pull=Pin.PULL_UP) # declaration d'une variable de type pin ici la 14 
                                                    #et on prescise que c'est une pine d'entré de courant (IN)

for led in leds:
    led.freq(1000)
    led.duty_u16(0)

for i in range(len(leds)):
    tab[i].freq(1000)
    tab[i].duty_u16(0)
    

def set_colour (r,g,b):
    leds[0].duty_u16(r*255)
    leds[1].duty_u16(g*255)
    leds[2].duty_u16(b*255)



while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass


while(True):
    try:
        print("GET")
        r = urequests.get(url) # lance une requete sur l'url
        tweet_content = response.json()["content"]
        print(tweet_content)
        if tweet_content in tweet_colour:
            colour = tweet_colour[tweet_content]
            set_color(color[0], color[1], color[2])
        r.close() # ferme la demande
        utime.sleep(0.5)
    except Exception as e:
        print(e)