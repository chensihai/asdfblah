# asdfblah

php version require >7.0
start server php -S 192.168.118.128:3333 proxy.php &


 curl http://192.168.118.128:3333/proxy/http://httpbin.org/get
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


curl -X POST -d asdf=blah  http://192.168.118.128:3333/proxy/http://httpbin.org/post
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


