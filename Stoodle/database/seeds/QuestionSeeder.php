<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(array(
            array(
                "question" => "Ce este Stoodle?",
                "answer" => "Stoodle este o platforma online ce vine in ajutorul tinerilor ce sunt in cautarea unei facultati."
            ),
            array(
                "question" => "Cat costa sa ma inscriu pe aceasta platforma?",
                "answer" => "Platforma este gratuita in momentul de fata."
            ),
            array(
                "question" => "Ce face Stoodle cu datele mele ?",
                "answer" => "Stoodle foloseste datele tale doar pentru a creea o experienta cat mai buna a dumneavoastra cand 
                            utilizati platforma,cu asigurarea ca nu vor fi impartasite cu nimeni."
            ),
            array(
                "question" => "Care este viziunea aplicatiei in viitor?",
                "answer" => "In viitor , aplicatia isi propune sa customizeze cu cat mai mult experienta fiecarui utilizator, 
                                imbunatatind algoritmul de sortare al facultatilor.In acelasi timp isi propune sa adauge un sistem 
                                comentarii pentru fiecare facultate si un forum. Pentru a permite utilazatorilor sa schimbe pareri despre facultati."
            ),
            array(
                "question" => "Cum a pornit ideea acestui site?",
                "answer" => "Totul a pornit cand cei ce au creat aplicatia doreau sa se orienteze spre o facultate, dar nu au 
                                gasit o aplicatie web ccare sa raspunda la toate cerintele, asa
                                luand nastere Stoodle."
            ),
            array(
                "question" => "Care este cea mai mare calitate a acestei aplicatii web?",
                "answer" => "Stoodle va pune intotdeauna utilizatorul pe primul plan, totul bazandu-se pe alegerile facute de acesta."
            ),
            array(
                "question" => "In ce stadiu al constructiei este in acest moment aplicatia ?",
                "answer" => "Aplicatia este in stadiul de beta platformei inca trebuind sa i se adauge cateva mici imbunatatiri."
            ),
        ));
    }
}
