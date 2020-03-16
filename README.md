# Server Sided Files

An all in one URL for downloading an unlimited amount of files without giving up a direct download URL.

**Evan#5948** is the sole creator and owner of this project.

## Usage

- Setup a SQL table called **files** with two rows called **name** and **code**
- Enter your SQL credentials and customize the PHP files how you see fit
- Test the server side by uploading a file and refreshing the page to get its download code
- Replace the example URL in the c# project with yours and enter your file's code and a path
- Test the client side by running and seeing if your file downloads

## How It Works

The client side uses codes to download files from a static URL that is inaccessible from web browsers and third party clients.
```cs
DownloadFile("EgN20hac73N6D9hXP4prISRsaNSSRoRX", @"C:\Path\Download\Example.exe");
```

## Known Issues

- None so far!
