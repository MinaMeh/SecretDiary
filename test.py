
import requests
from hashlib import md5
 
s = requests.Session()
url = "http://challenge01.root-me.org/web-serveur/ch52/index.php?url=url&h="+ md5(("url").encode()).hexdigest()
result=s.get(url).text
print(result)