from ast import For
import mysql.connector
from datetime import datetime
import time
from mysql.connector import Error

def payment():
    monthlyCost = 2
    try:
        connection = mysql.connector.connect(host='localhost',
                                             database='fishfarm',
                                             user='root',
                                             password='mysql')
        if connection.is_connected():
            db_Info = connection.get_server_info()
            print("Connected to MySQL Server version ", db_Info)
            cursor = connection.cursor()
            cursor.execute("select * from subscriptions;")
            subs = cursor.fetchall()


            for x in subs:
                print(x[1])
                past = x[3]
                present = datetime.now()
                if past.date() < present.date():
                    cursor.execute("select * from wallets where user_id = "+str(x[1]))
                    credits = cursor.fetchone()
                    print(credits[2])
                    if x[4] == 'monthly':
                        if int(credits[2]) >= monthlyCost:
                            newCredits = int(credits[2])-monthlyCost
                            print(past)
                            cursor.execute("UPDATE `wallets` SET `credits`="+str(newCredits)+" WHERE user_id = "+str(x[1]))
                            connection.commit()
                            #2022-05-16 11:55:10
                            split = list(str(past))
                            month = str(split[5])+str(split[6])
                            tempMonth = int(month)+1

                            if tempMonth < 10:
                                newMonth = '0'+str(tempMonth)
                            else:
                                newMonth = str(tempMonth)

                            splitNewMonth = list(newMonth)
                            split[5] = splitNewMonth[0]
                            split[6] = splitNewMonth[1]
                            newDate = ''.join(split)
                            print(newDate)
                            cursor.execute("UPDATE `subscriptions` set stops_at = '"+str(newDate)+"', updated_at ='"+str(newDate)+"' WHERE user_id = "+str(x[1]))
                            connection.commit()
                            cursor.execute("INSERT INTO `transactions`( `user_id`, `amount`, `type`, `created_at`) VALUES ("+str(x[1])+","+str(monthlyCost)+",'monthly','"+str(newDate)+"')")
                            connection.commit()
                        else:
                            cursor.execute("UPDATE `subscriptions` set subscription_type = 'no subscription' WHERE user_id = "+str(x[1]))
                            connection.commit()
                        

    except Error as e:
        print("Error while connecting to MySQL", e)
    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("MySQL connection is closed")
    time.sleep(60)
    payment()

payment()

