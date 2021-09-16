# Salesforce 15-digit to 18-digit Id converter

## Introduction

This repository contains some small code snippets in diffenent programming languages, that all have one purpose: converting Salesforce's case sensitive 15-digit Ids into the 18-digit Ids which aren't case sensitive. This might come in handy if you are working with a file system that isn't case sensitive and you want to write information to a file using the salesforce ids as filename for example.

If you want to read more about the usage and conversion of Salesforce IDs or want to use an online converter based on the JavaScript implementation of this repository, go check out [the related article on my blog markus.codes](https://markus.codes/2021/02/03/salesforce-id-15-18-digit-lengths)

## Available Versions

 - JavaScript
 - Python
 - Go
 - OpenOffice/LibreOffice Macro
 - Google Spreadsheets script
 - PHP

## Usage

### Adding sf15to18.bas to Excel

1. Open or create a spreadsheet in Excel
2. Go to *Tools > Macro > Visual Basic Editor*
3. Right click on *This Workbook* and select *Insert > Module*
4. Copy and paste the contents of `sf15to18.bas` to the editor
5. Save the macro
6. Use it in your spreadsheet. If you want to convert the value of *Cell B1*, you need to use the following formula for example: `=sf15to18(B1)`

### Adding sf15to18.bas to OpenOffice/LibreOffice

1. Open or create a spreadsheet in OpenOffice/LibreOffice
2. Press *Alt-F11* and create a new Basic Macro
3. Create a new Macro
4. Copy and paste the contents of `sf15to18.bas` to the editor
5. Save the macro
6. Use it in your spreadsheet. If you want to convert the value of *Cell B1*, you need to use the following formula for example: `=sf15to18(B1)`

### Adding sf15to18.gs to Google Spreadsheets

1. Open or create a spreadsheet on Google Spreadsheets
2. Go to *Tools -> Script editor*
3. Select *Blank Project*
4. Copy and paste the contents of `sf15to18.gs` to the script editor
5. Save the script as `sf15to18`
6. Use it in your spreadsheet. If you want to convert the value of *Cell B1*, you need to use the following formula for example: `=sf15to18(B1)`

## How it works

Getting the case insensitive 18-digit Id is an easy process which basically works like this:

1. The 15-digit Id is split into three 5-digit segments.
2. Each of these segments is then reversed.
3. Every uppercase letter is replaced with a 1, every other digit with a 0.
4. The three suffix-digits for the Id can then be looked up in a table, segment by segment (first segment gives the first digit, etc.). The table below shows an excerpt of such a table, which can be easily completed.

### Lookup table

| segment result | suffix digit |
|---|---|
| 00000 | A |
| 00001 | B |
| 00010 | C |
| 00011 | D |
| 00100 | E |
| 00101 | F |
| ... | ... |
| 11010 | 0 |
| 11011 | 1 |
| 11100 | 2 |
| 11101 | 3 |
| 11110 | 4 |
| 11111 | 5 |

## Contributors

|Major Contributors | |
|:----|----:|
|Markus Dang (formerly Slabina) |[![mslabina on Twitter](https://raw.githubusercontent.com/ExactTarget/fuelux/gh-pages/invertobird-sm.png)](https://twitter.com/mslabina) [![mslabina on Github](https://raw.githubusercontent.com/ExactTarget/fuelux/gh-pages/invertocat-sm.png)](https://github.com/mslabina) |

## License (MIT)

__Copyright © 2018-2021 [Markus Dang (formerly Slabina)](https://github.com/mslabina)__

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
