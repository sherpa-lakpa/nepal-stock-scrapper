# nepal-stock-scrapper (nepse-data)
A data API that serves market information and stock prices from Nepal Stock Exchange's website as JSON. The data is obtained by scraping web pages.

It scrapes the website on every request. Since this is scraped data, it will break with changes to NEPSE's website design. 

## Usage

A running instance can be found at [https://slakpa.com.np/api/stock-today/](https://slakpa.com.np/api/stock-today/) .

To run your own copy, clone this repository and run:

```console
foo@bar:~$ cd nepal-stock-scrapper
```

```console
foo@bar:~$ composer install
```

```console
foo@bar:~$ php scrapper.php
```
or to prettify your json output
```console
foo@bar:~$ php scrapper.php | python -m json.tool
```

## License

The Nepal Stock Scrapper is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
