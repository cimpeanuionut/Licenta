using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;
using System.Net;
using System.Security.Cryptography.X509Certificates;
using System.IO;
using System.Security.Cryptography.Xml;
namespace Cazier_PrivateKey
{
    class Program
    {
        static void Main(string[] args)
        {
            XmlDocument doc = new XmlDocument();
            using (WebClient client = new WebClient())
            {
               byte[] xmlBytes = client.DownloadData("https://www.wibit.net/labWebService/rest/getCoursesForCurriculum/1");
                doc.LoadXml(Encoding.UTF8.GetString(xmlBytes));
            }
            string p12Path = @"C:\Users\dec2017\Desktop\Cazier Semnatura Digitala\cazier.p12";
            X509Certificate2 cert = new X509Certificate2(File.ReadAllBytes(p12Path), "");
            SignXmlDocumentCertificate(doc, cert);
            File.WriteAllText(@"C:\Users\dec2017\Desktop\cazier_protectie.xml", doc.OuterXml);

        }

        public static void SignXmlDocumentCertificate(XmlDocument doc, X509Certificate2 cert)
         
        {
            SignedXml signedXml = new SignedXml(doc);
            signedXml.SigningKey = cert.PrivateKey;
            Reference reference = new Reference();
            reference.Uri = "";
            reference.AddTransform(new XmlDsigEnvelopedSignatureTransform());
            signedXml.AddReference(reference);

            KeyInfo keyInfo = new KeyInfo();
            keyInfo.AddClause(new KeyInfoX509Data(cert));

            signedXml.KeyInfo = keyInfo;
            signedXml.ComputeSignature();
            XmlElement xmlSig = signedXml.GetXml();

            doc.DocumentElement.AppendChild(doc.ImportNode(xmlSig, true));


        }
    }
}
