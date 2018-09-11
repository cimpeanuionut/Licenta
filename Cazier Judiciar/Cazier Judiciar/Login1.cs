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
namespace Cazier_Judiciar
{
    public partial class Login1 : Form
    {
        public Login1()
        {
            InitializeComponent();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Register1 r1 = new Register1();
            r1.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection("server=localhost;user id=root;database=cazier_judiciar");
            con.Open();
            string newcon = "select * from users_cazier where Username = '"+textBox1.Text+"' and Password = '"+textBox2.Text+"'";
            MySqlDataAdapter adp = new MySqlDataAdapter(newcon, con);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            DataTable dt = ds.Tables[0];
            if (dt.Rows.Count ==1)
            {
                Baza_Cazier bc = new Baza_Cazier();
                bc.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Login invalid");
            }
            con.Close();
        }
    }
}
