# Server Sided Files

An all in one URL for downloading an unlimited amount of files without giving up a direct download URL.

**Sensuret#0001** is the sole creator and owner of this project.

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

private static void DownloadFile(string code, string path)
{
  var url = "http://domain.ltd/secure-files/download.php";
  using (var client = new WebClient())
  {
    var values = new NameValueCollection  
    {
      { "code", code }
    };
    byte[] result = client.UploadValues(url, values);
    File.WriteAllBytes(path, result);
  }
}
```

## Known Issues

- None so far!
