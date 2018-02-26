#!/usr/bin/python

import time
from time import gmtime, strftime
from datetime import datetime
import urllib            # URL functions
import urllib2           # URL functions
import httplib
import sys
import MySQLdb


#db = MySQLdb.connect(ip, user, pass, dbName)
db = MySQLdb.connect("localhost", "root", "", "mydb")
curs=db.cursor()

curs.execute ("SELECT * FROM Measurements")

			
				
print "\nNum\tTime\t\t\tTemp\tHumid-%\tCO2\tCO\tRoomId"
print "=========================================================================="

for reading in curs.fetchall():
    print str(reading[0])+"\t"+str(reading[1])+"\t"+\
                str(reading[2]) + "\t" + str(reading[3]) + "\t" + str(reading[4]) + "\t" + str(reading[5]) + "\t" + str(reading[6])
				
				
				
