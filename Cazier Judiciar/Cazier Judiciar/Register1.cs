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
    public partial class Register1 : Form
    {

        string email;
        private void textBox4_KeyPress(object sender, KeyPressEventArgs e)
        {
            char ch = e.KeyChar;
            if (!Char.IsDigit(ch) && ch!=8 && ch!= 46)
            {
                e.Handled = true;
            }
        }

        public Register1()
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
            
            MySqlConnection con = new MySqlConnection("server=localhost;user id=root;database=cazier_judiciar");
            con.Open();
            if (EmailValidation.checkForEmail(textBox5.Text.ToString()))
            {
                email = textBox5.Text;
                string newCon = "insert into users_cazier(Nume,Username,Password,Varsta,Email) VALUES ('" + textBox1.Text + "','" + textBox2.Text + "','" + textBox3.Text + "','" + textBox4.Text + "','" + email + "')";
                MySqlCommand cmd = new MySqlCommand(newCon, con);
                cmd.ExecuteNonQuery();
                label7.Text = "V-ati inregistrat cu succes!";
            }
            else
            {
                MessageBox.Show("Email InValid");
            }
            textBox1.Text = "";
            textBox2.Text = "";
            textBox3.Text = "";
            textBox4.Text = "";
            textBox5.Text = "";
            con.Close();


        }

        
    }
}
