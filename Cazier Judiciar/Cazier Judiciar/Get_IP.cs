using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
namespace Cazier_Judiciar
{
    public  class Get_IP
    {
        public static string obtine_IP(String IP)
        {
            IPHostEntry host;
            IP = "?";
            host = Dns.GetHostEntry(Dns.GetHostName());

            foreach (IPAddress ip in host.AddressList)
            {
                if (ip.AddressFamily.ToString() == "InterNetwork")
                {
                    IP = ip.ToString();
                   
                }
            }
            return IP;
        }
    }
}
