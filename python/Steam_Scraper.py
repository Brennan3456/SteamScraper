fd = open("test.txt","w+")
fd.write("fudge")
fd.close()

# Instructions:
# https://www.youtube.com/watch?v=XQgXKtPSzUI

#  If not Recknoised VVVVVVVV
# set PATH=%PATH%;C:\Python34\Scripts
# set PATH=%PATH%;C:\Python34


#pip install bs4
#python

import bs4
from urllib.request import urlopen as uReq
from bs4 import BeautifulSoup as soup

my_url = 'http://store.steampowered.com/'

# opening connection, taking the page
uClient = uReq(my_url)
page_html = uClient.read()
uClient.close()

# Parsing
page_soup = soup(page_html,"html.parser")

# Grabs Each Product
containers = page_soup.findAll("div",{"id":"tab_topsellers_content"})


# 1 Product

#container = containers[0]
#container.a

 
# ALl game titles

#title_container = container.findAll("div",{"class":"tab_item_name"})


# First Game

#product_name = title_container[0].text
#product_name[0].text


# First Price

#game_price =container.findAll("div,{"class":"discount_final_price"})
#game_price[0].text



#Loop 

filename = "games.csv"
f = open(filename, "w")

headers = "game, price \n"

f.write(headers)



for container in containers:
	title_container = container.findAll("div",{"class":"tab_item_name"})
	product_name = title_container[0].text

	game_price = container.findAll("div",{"class":"discount_final_price"})
	price =	game_price[0].text

	print("game_name: " + product_name)


	f.write(product_name +"\n" + price.replace(",",".") + "\n"  )

	print("price: " + price)

	title_container = container.findAll("div",{"class":"tab_item_name"})
	product_name = title_container[1].text

	game_price = container.findAll("div",{"class":"discount_final_price"})
	price =	game_price[1].text

	print("game_name: " + product_name)


	f.write(product_name +"\n" + price.replace(",",".") + "\n"  )

	print("price: " + price)


	f.close()
	
	

