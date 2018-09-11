using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;
using System.IO;
using System.Security.Cryptography.X509Certificates;
using System.Security.Cryptography.Xml;

namespace Cazier_Judiciar
{
    public class Cazier_PublicKey
    {
        public static bool  Public_Key()
            {
            bool ok;
            string xmlString = File.ReadAllText(@"C:\Users\dec2017\Desktop\cazier_protectie.xml");
            XmlDocument doc = new XmlDocument();
            doc.LoadXml(xmlString);
            try
            {
                X509Certificate2 pubCert = new X509Certificate2(@"C:\Users\dec2017\Desktop\Cazier Semnatura Digitala\cazier.pem");
                ok = ValidateXMlDocumentWithCertificate(doc, pubCert);
                return ok;
            }
            catch { return false; }
            
            }

            public static bool ValidateXMlDocumentWithCertificate (XmlDocument doc, X509Certificate2 cert)
        {
            try
            {
                SignedXml signedXml = new SignedXml(doc);
                XmlNode signatureNode = doc.GetElementsByTagName("Signature")[0];
                signedXml.LoadXml((XmlElement)signatureNode);
                return signedXml.CheckSignature(cert, true);
            }
            catch { return false; }
        }
            

    }
}
