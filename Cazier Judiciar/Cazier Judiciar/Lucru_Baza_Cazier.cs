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
    public partial class Lucru_Baza_Cazier : Form
    {
        MySqlConnection con = new MySqlConnection("server=localhost;user id=root;database=cazier_judiciar");
        public Lucru_Baza_Cazier()
        {
            InitializeComponent();
        }
        public void afisare_baza()
        {
            con.Open();
            MySqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "select * from cazier_judiciar";
            cmd.ExecuteNonQuery();
            DataTable dt = new DataTable();
            MySqlDataAdapter da = new MySqlDataAdapter(cmd);
            da.Fill(dt);
            dataGridView1.DataSource = dt;
            con.Close();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Lucru_cu_Baza_Cazier lbc = new Lucru_cu_Baza_Cazier();
            lbc.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            afisare_baza();
        }

        private void Lucru_Baza_Cazier_Load(object sender, EventArgs e)
        {
            afisare_baza();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand cmd;
            MySqlDataReader mdr;
            string selectQuery = "select * from cazier_judiciar where Nume = '" + textBox1.Text + "'";
            cmd = new MySqlCommand(selectQuery, con);
            mdr = cmd.ExecuteReader();
            if (mdr.Read())
            {
                mdr.Close();
                cmd.ExecuteNonQuery();
                DataTable dt = new DataTable();
                MySqlDataAdapter da = new MySqlDataAdapter(cmd);
                da.Fill(dt);
                dataGridView1.DataSource = dt;
                textBox1.Text = "";
            }
            else
            {
                textBox1.Text = "";
                MessageBox.Show("No data for this Name");
            }
            con.Close();
        }
    }
}
