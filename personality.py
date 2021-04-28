import mysql.connector
import numpy as np
import sys
import os

x=sys.argv[1]

print(x)

currUID = int(sys.argv[1])


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="hearts desire"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT E_ans,S_ans,T_ans,J_ans FROM personality_test where Personality_id = 1")

myresult = mycursor.fetchone()

print(myresult)

a = []

def precentage(x):
    i=x
    res = list(map(int, myresult[i])) 
    sum1 = 0
    for j in res:
        num = res[j]  
        if (j == 1):
            sum1 = sum1+j             
    matching_rate = 0
    matching_rate = sum1/10
    global s
    s= sum1
    print (matching_rate)
    return(matching_rate)


def introvert():
        y=0
        matching_rate = precentage(y)
        if (s >= 5):
            p1 = "I"
        else :
            p1 = "E"
        a.append(p1)
        a1 = ''.join(map(str, a)) 
        sql= """UPDATE personality_test SET E_value = %s WHERE Personality_id = 141"""
        val=(matching_rate) 
        mycursor.execute(sql, (val,))
        mydb.commit()
        sql1= """UPDATE personality_test SET Personality_type = %s WHERE Personality_id = 141"""
        val1=(a1) 
        mycursor.execute(sql1, (val1,))
        mydb.commit()
introvert()        
        
def intitive():
        y=1
        matching_rate = precentage(y)
        if (s >= 5):
            p2="S"
        else :
            p2="N"
        a.append(p2)
        a1 = ''.join(map(str, a)) 
        sql= """UPDATE personality_test SET S_value = %s WHERE Personality_id = 141"""
        val=(matching_rate) 
        mycursor.execute(sql, (val,))
        mydb.commit()
        sql1= """UPDATE personality_test SET Personality_type = %s WHERE Personality_id = 141"""
        val1=(a1) 
        mycursor.execute(sql1, (val1,))
        mydb.commit()
intitive()


def thinking():
        y=2
        matching_rate = precentage(y)
        if (s >= 5):
            p3="F"
        else :
            p3="T"
        a.append(p3)
        a1 = ''.join(map(str, a)) 
        sql= """UPDATE personality_test SET T_value = %s WHERE Personality_id = 141"""
        val=(matching_rate) 
        mycursor.execute(sql, (val,))
        mydb.commit()
        sql1= """UPDATE personality_test SET Personality_type = %s WHERE Personality_id = 141"""
        val1=(a1) 
        mycursor.execute(sql1, (val1,))
        mydb.commit()
thinking()

def judging():
        y=3
        matching_rate = precentage(y)
        if (s >= 5):
            p4 = "P"
        else :
            p4 = "J"
        a.append(p4)
        a1 = ''.join(map(str, a)) 
        sql= """UPDATE personality_test SET J_value = %s WHERE Personality_id = 140"""
        val=(matching_rate) 
        mycursor.execute(sql, (val,))
        mydb.commit()
        sql1= """UPDATE personality_test SET Personality_type = %s WHERE Personality_id = 141"""
        val1=(a1) 
        mycursor.execute(sql1, (val1,))
        mydb.commit()
judging()
