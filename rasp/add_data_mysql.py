#!/usr/bin/python
#-*-coding: utf-8-*-

import serial, time
import httplib, urllib
import sys
import ftplib
import re
import time
import MySQLdb as mdb

def addDataToMysql(temp,humid,co2,co,id):
    # Open database connection
   db = mdb.connect("localhost","root","","mydb" )
   cursor = db.cursor()
					
   cursor.execute('''INSERT INTO Measurements (Temperature, Humidity, CO2 ,CO, Room_idRoom)
                       VALUES (%s, %s, %s, %s, %s);''',
                    (temp,humid,co2,co,id))
    # Commit your changes in the database
   db.commit()
   db.close()
	
#start = time.time()
port = serial.Serial('/dev/ttyACM0', 9600, timeout = 2) #portin lukuparametrit: portti, baudinopeus, timeout
port.flushInput()

while True:
    temper = 0
    humid = 0
    co2 = 0
    co = 0
    id = 0
   
    
# silmukka lukee usb-porttiin kytketyltä master-noodilta tulevaa dataa
# kerralla voidaan lukea kuutta noodia yhtä aikaa


    data = port.read(30)

    if data ==[]:
        data = "0;0;0;0;0"

    if 'x' in data:

        (val_, val1_, val2_, val3_, val4_, val5_)= str(data).split(";")
    
        #temper = String(val_)

        temper = float(val1_)

        humid = float(val2_)

        co2 = float(val3_)

        co = float(val4_)
		
        id = int(val5_)

        print (temper, humid, co2, co, id)
             
        addDataToMysql(temper,humid,co2,co,id)
