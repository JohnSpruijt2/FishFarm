import cv2
from object_detector import *
import numpy as np
from ast import For
import mysql.connector
import time
from mysql.connector import Error
def measure():
    try:
        connection = mysql.connector.connect(host='localhost',
                                             database='fishfarm',
                                             user='root',
                                             password='mysql')
        if connection.is_connected():
            db_Info = connection.get_server_info()
            print("Connected to MySQL Server version ", db_Info)
            cursor = connection.cursor()
            cursor.execute("select * from images;")
            imgs = cursor.fetchall()
            for img in imgs:
                # Load Aruco detector
                parameters = cv2.aruco.DetectorParameters_create()
                aruco_dict = cv2.aruco.Dictionary_get(cv2.aruco.DICT_5X5_50)


                # Load Object Detector
                detector = HomogeneousBgDetector()

                # Load Image
                image = cv2.imread("../storage/app/"+img[4])

                # Get Aruco marker
                corners, _, _ = cv2.aruco.detectMarkers(image, aruco_dict, parameters=parameters)

                # Draw polygon around the marker
                int_corners = np.int0(corners)
                cv2.polylines(image, int_corners, True, (0, 255, 0), 5)

                # Aruco Perimeter
                aruco_perimeter = cv2.arcLength(corners[0], True)

                # Pixel to cm ratio
                pixel_cm_ratio = aruco_perimeter / 20

                contours = detector.detect_objects(image)

                # Draw objects boundaries
                for cnt in contours:
                    # Get rect
                    rect = cv2.minAreaRect(cnt)
                    (x, y), (w, h), angle = rect

                    # Get Width and Height of the Objects by applying the Ratio pixel to cm
                    object_width = w / pixel_cm_ratio
                    object_height = h / pixel_cm_ratio

                    #format(round(object_width, 1))
                    #format(round(object_height, 1))
                    if (format(round(object_width, 1)) != format(round(object_height, 1))):
                        if format(round(object_width, 1)) < format(round(object_height, 1)):
                            fish_length = format(round(object_height, 1))
                            fish_width = format(round(object_width, 1))
                        else:
                            fish_length = format(round(object_width, 1))
                            fish_width = format(round(object_height, 1))
                        fish_weight = 1*float(fish_length)**float(fish_width)
                        fish_l = str(fish_length)
                        fish_w = str(fish_width)
                        fish_s = str(format(round(fish_weight, 1)))
                        path = str(img[4]).replace('public', 'storage')
                        cursor.execute("INSERT INTO `fish_measurements`(`user_id`, `fish_type`, `name`, `description`, `path`, `length`, `width`, `weight`, `created_at`, `updated_at`) VALUES ('"+str(img[1])+"','"+str(img[2])+"','"+str(img[3])+"','"+str(img[6])+"','"+str(path)+"','"+fish_l+"','" +fish_w+"','"+fish_s+"','"+str(img[7])+"','"+str(img[8])+"')")
                        connection.commit()
                id = int(img[0])
                cursor.execute("DELETE FROM `images` WHERE `images`.`id` = '"+str(id)+"'")
                connection.commit()

    except Error as e:
        print("Error while connecting to MySQL", e)
    finally:
        if connection.is_connected():
            cursor.close()
            connection.close()
            print("MySQL connection is closed")
    time.sleep(60)
    measure()

measure()


