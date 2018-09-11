using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Cazier_Judiciar
{
    public partial class Form1 : Form
    {
        bool autorizare;
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Login1 l1 = new Login1();
            l1.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            autorizare = Cazier_PublicKey.Public_Key();
            if (autorizare == true)
            {
                Login2 l2 = new Login2();
                l2.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Nu esti autorizat sa accesezi aceste documente");
            }
        }
    }
}
