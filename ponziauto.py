import mysql.connector
from mysql.connector import Error
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
import time
from selenium.webdriver.common.by import By
import datetime
import pytz
import threading


class sesiuni:
    numar = 0


ses = sesiuni()


def executatDA(id):
    mycursor.execute("UPDATE abonamente SET executat = 1 WHERE idabonamente = '" + id + "'")
    connection.commit()
    # print('modificat')


def executatNU():
    mycursor.execute("UPDATE abonamente SET executat = 0")
    connection.commit()
    # print('modificat')


def pydamid(id, nume, parola, vip):
    ses.numar = ses.numar + 1

    # Initiate the browser
    browser = webdriver.Chrome(ChromeDriverManager().install())

    browser.get('https://pydamid99.com/index/user/login.html')

    # Log in
    time.sleep(1)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/select").click()
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/select/option[1]").click()
    time.sleep(1)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/ul/li[1]/input").send_keys(nume)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/ul/li[2]/input").send_keys(parola)
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/div[2]/button[1]").click()
    time.sleep(2)

    # Browse
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/div/div[1]/div/div[1]/img").click()
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[8]/div[2]/div[1]/div[2]/div[3]/img").click()
    time.sleep(5)

    browser.get('https://pydamid99.com/index/rot_order/index.html?type=' + str(vip))


    time.sleep(5)
    # Picker
    for x in range(52):
        try:
            time.sleep(2)
            browser.find_element(by=By.XPATH, value="/html/body/div/div/div[3]/div/div").click()
            time.sleep(7)
            browser.find_element(by=By.XPATH, value="/html/body/div/div/div[5]/div/div/div[3]/div").click()
            time.sleep(5)
        except:
            try:
                browser.find_element(by=By.XPATH, value="/html/body/div/div/div[5]/div/div/div[3]/div").click()
                time.sleep(5)
            except:
                executatDA(id)
                ses.numar = ses.numar - 1
                browser.quit()
    executatDA(id)
    ses.numar = ses.numar - 1


def test():
    login_name = "0123456789"
    login_pass = "psw"

    # Initiate the browser
    browser = webdriver.Chrome(ChromeDriverManager().install())

    browser.get('https://pydamid99.com/index/user/login.html')

    # Log in
    time.sleep(1)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/select").click()
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/select/option[1]").click()
    time.sleep(1)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/ul/li[1]/input").send_keys(login_name)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/ul/li[2]/input").send_keys(login_pass)
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[4]/div[2]/button[1]").click()
    time.sleep(2)

    # Browse
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[2]/div/div[1]/div/div[1]/img").click()
    time.sleep(2)
    browser.find_element(by=By.XPATH, value="/html/body/div[1]/div/div[8]/div[2]/div[1]/div[2]/div[3]/img").click()
    time.sleep(5)

    browser.get('https://pydamid99.com/index/rot_order/index.html?type=7')

    time.sleep(5)
    # Picker
    for x in range(52):
        try:
            time.sleep(2)
            browser.find_element(by=By.XPATH, value="/html/body/div/div/div[3]/div/div").click()
            time.sleep(7)
            browser.find_element(by=By.XPATH, value="/html/body/div/div/div[5]/div/div/div[3]/div").click()
            time.sleep(5)
        except:
            try:
                browser.find_element(by=By.XPATH, value="/html/body/div/div/div[5]/div/div/div[3]/div").click()
                time.sleep(5)
            except:
                browser.quit()


def create_connection():
    connection = None
    try:
        connection = mysql.connector.connect(
            host="autoponzi.com",
            port="3306",
            user="autoponz_ponzibot",
            passwd="psw",
            database="autoponz_autoponzi"
        )
        print("Connection to DB successful")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection


connection = create_connection()
print(connection)
mycursor = connection.cursor()


def executare():
    mycursor.execute("SELECT * FROM abonamente WHERE executat = 0")

    myresult = mycursor.fetchall()

    for x in myresult:
        while ses.numar >= 2:
            time.sleep(5)
            # print(ses.numar)
        if (x[1] == 1):
            threading.Thread(target=pydamid, args=(x[0], x[2], x[3], x[4])).start()

        time.sleep(1)


golire=0
executat=0

while True:
    today = datetime.datetime.now(pytz.timezone('Europe/Bucharest'))

    if (int(today.hour) == 4) & (golire == 0):
        golire= 1
        print('GOLIRE', today.hour, today.minute)
        # executatNU()

    if (int(today.hour) == 5) & (executat== 0):
        executat= 1
        # test()
        executare()
        # print(today.second)
        print('START', today.hour, today.minute)

    if (int(today.hour) == 6) & (executat == 1):
        executat= 0
        golire= 0
        print('RESET', today.hour, today.minute)
    time.sleep(5)



