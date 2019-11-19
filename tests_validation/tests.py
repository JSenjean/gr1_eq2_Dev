import test_uS1
import test_uS2

import unittest
import pytest
import time
import json
import sys
import time
import os
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import NoSuchElementException



def main(out = sys.stderr, verbosity = 3):
    suite = unittest.TestSuite()
    suite.addTest(unittest.makeSuite(test_uS1.TestUS1))
    suite.addTest(unittest.makeSuite(test_uS2.TestUS2))
    unittest.TextTestRunner(out, verbosity = verbosity).run(suite)

if __name__ == '__main__': 

    if not os.path.exists("logs"):
        os.makedirs("logs")

    timestr = time.strftime("%Y%m%d-%H%M%S")
    
    with open('logs' + os.path.sep + 'log_' + timestr + '.txt', 'w') as f: 
        main(f) 