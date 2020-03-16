using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Windows;

namespace Server
{
    class Program
    {
        static void Main(string[] args)
        {
            DownloadFile("file code", "path to download");
            Console.ReadLine();
        }

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
    }
}
