using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;

namespace Cazier_Judiciar
{
   public class EmailValidation
    {
        public static bool checkForEmail(String email)
        {
            bool ISValid = false;
            Regex r = new Regex(@"^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$");
            if (r.IsMatch(email))
                ISValid = true;
            return ISValid;
        }
    }
}
