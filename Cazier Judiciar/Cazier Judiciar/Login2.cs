using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Net;

namespace Cazier_Judiciar
{
    public partial class Login2 : Form
    {
        string ip;
        public Login2()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection("server=localhost;user id=root;database=cazier_judiciar");
            con.Open();
            ip = Get_IP.obtine_IP(ip);
            string newcon = "select * from administratori_cazier where Username = '" + textBox1.Text + "' and Password = '" + textBox2.Text + "' and IP= '"+ip+"'";
            MySqlDataAdapter adp = new MySqlDataAdapter(newcon, con);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            DataTable dt = ds.Tables[0];
            if (dt.Rows.Count == 1)
            {
                Lucru_cu_Baza_Cazier lbc = new Lucru_cu_Baza_Cazier();
                lbc.Show();
                this.Hide();
                    
            }
            else
                MessageBox.Show("Login Invalid");




            con.Close();
        }
    }
}
