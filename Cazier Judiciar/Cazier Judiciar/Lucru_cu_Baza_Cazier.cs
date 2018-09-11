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
    public partial class Lucru_cu_Baza_Cazier : Form
    {
        string Nume, Prenume, Adresa, Telefon, Infractiune, Reabilitare;
        MySqlConnection con = new MySqlConnection("server=localhost;user id=root;database=cazier_judiciar");
        string reab1 = "Da";
        string reab2 = "Nu";
        public Lucru_cu_Baza_Cazier()
        {
            InitializeComponent();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Lucru_Baza_Cazier lbc = new Lucru_Baza_Cazier();
            lbc.Show();
            this.Hide();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            con.Open();
            if (reab1 == textBox6.Text.ToString() || reab2 == textBox6.Text.ToString() ) {
                    string newCon = "insert into cazier_judiciar(Nume,Prenume,Adresa,Telefon,Infractiune,Reabilitare) VALUES ('" + textBox1.Text + "','" + textBox2.Text + "','" + textBox3.Text + "','" + textBox4.Text + "','" + textBox5.Text + "','" + textBox6.Text + "')";
                    MySqlCommand cmd = new MySqlCommand(newCon, con);
                    cmd.ExecuteNonQuery();
                    MessageBox.Show("Persoana a fost introdusa in baza de date Cazier Judiciar");
                    
                }
                else
                {

                MessageBox.Show("Please insert Da/Nu in field Reabilitare");
                }
                           
            
            con.Close();
            textBox1.Text = "";
            textBox2.Text = "";
            textBox3.Text = "";
            textBox4.Text = "";
            textBox5.Text = "";
            textBox6.Text = "";
            
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();
        }

        private void textBox4_KeyPress(object sender, KeyPressEventArgs e)
        {
            char ch = e.KeyChar;
            if (!Char.IsDigit(ch) && ch != 8 && ch != 46)
            {
                e.Handled = true;
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            con.Open();
            preluare_date_Baza();
            if(Nume == textBox1.Text)
            {
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "update cazier_judiciar set Nume= '" + textBox1.Text + "', Prenume= '" + textBox2.Text + "', Adresa= '" + textBox3.Text + "', Telefon= '" + textBox4.Text + "', Infractiune= '" + textBox5.Text + "', Reabilitare= '" + textBox6.Text + "' where Nume = '" + textBox1.Text + "'";
                cmd.ExecuteNonQuery();
                textBox1.Text = "";
                textBox2.Text = "";
                textBox3.Text = "";
                textBox4.Text = "";
                textBox5.Text = "";
                textBox6.Text = "";
                MessageBox.Show("Datele persoanei au fost modificate cu succes");
            }
            else
            {
                textBox1.Text = "";
                textBox2.Text = "";
                textBox3.Text = "";
                textBox4.Text = "";
                textBox5.Text = "";
                textBox6.Text = "";
               
            }
            con.Close();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            con.Open();
            preluare_date_Baza();
            textBox1.Text = Nume;
            textBox2.Text = Prenume;
            textBox3.Text = Adresa;
            textBox4.Text = Telefon;
            textBox5.Text = Infractiune;
            textBox6.Text = Reabilitare;
            con.Close();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            con.Open();
            preluare_date_Baza();
            
            if ( Reabilitare == "Da") {                
                MySqlCommand cmd = con.CreateCommand();
                cmd.CommandType = CommandType.Text;
                cmd.CommandText = "delete from cazier_judiciar where Nume= '" + textBox1.Text + "'";
                cmd.ExecuteNonQuery();
                textBox1.Text = "";
                textBox2.Text = "";
                textBox3.Text = "";
                textBox4.Text = "";
                textBox5.Text = "";
                textBox6.Text = "";
                MessageBox.Show("Persoana a fost stearsa din baza cazier judiciar");
            }
            else
            {
                textBox1.Text = "";
                textBox2.Text = "";
                textBox3.Text = "";
                textBox4.Text = "";
                textBox5.Text = "";
                textBox6.Text = "";
                MessageBox.Show("Aceasta persoana nu poate fi stearsa din baza cazier judiciar");
                
            }
            con.Close();
            
        }

        public void preluare_date_Baza()
        {
            MySqlCommand cmd;
            MySqlDataReader mdr;
            string selectQuery = "select * from cazier_judiciar where Nume = '" + textBox1.Text + "'";
            cmd = new MySqlCommand(selectQuery, con);
            mdr = cmd.ExecuteReader();
            if (mdr.Read())
            {
                Nume= mdr.GetString("Nume");
                Prenume = mdr.GetString("Prenume");
                Adresa = mdr.GetString("Adresa");
                Telefon = mdr.GetString("Telefon").ToString();
                Infractiune = mdr.GetString("Infractiune");
                Reabilitare = mdr.GetString("Reabilitare");
            }
            else
            {
                Nume = "";
                Prenume = "";
                Adresa = "";
                Telefon = "";
                Infractiune = "";
                Reabilitare = "";
                MessageBox.Show("No data for this Name");
            }
            mdr.Close();
            
        }
    }
}
