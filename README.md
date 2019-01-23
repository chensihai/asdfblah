# asdfblah

php version require >=7.0

To start server,
 php -S localhost:8000 proxy.php &


 curl http://localhost:8000/proxy/http://httpbin.org/get
response
string(159) "{
  "args": {},
  "headers": {
    "Connection": "close",
    "Host": "httpbin.org"
  },
  "origin": "209.29.115.170",
  "url": "http://httpbin.org/get"
}
"


curl -X POST -d asdf=blah  http://localhost:8000/proxy/http://httpbin.org/post
response 
string(331) "{
  "args": {},
  "data": "",
  "files": {},
  "form": {
    "asdf": "blah"
  },
  "headers": {
    "Connection": "close",
    "Content-Length": "9",
    "Content-Type": "application/x-www-form-urlencoded",
    "Host": "httpbin.org"
  },
  "json": null,
  "origin": "209.29.115.170",
  "url": "http://httpbin.org/post"
}
"


