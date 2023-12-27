<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use App\Models\Message;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSender;

class FunctionsController extends Controller
{

    public function home()
    {

        $professores = Teacher::all();

        return view('home', compact('professores'));
    }

    public function mensagem(Request $request)
    {

        $mensagem = Message::create([
            'aluno' => $request->name,
            'email' => $request->email,
            'professor_id' => $request->teacher,
            'mensagem' => $request->mensagem
        ]);

        if($mensagem){
            return redirect()->route('home')->with('success', 'Mensagem enviada com sucesso!');
        } else {
            return redirect()->route('home')->with('error', 'Erro ao enviar a Mensagem.');
        }
    }

    public function trabalheConoscoView()
    {

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome', [
                'verify' => false
            ]);

            $body = $response->getBody();
            $estados = $body->getContents();
            $estados = json_decode($estados);
        } catch (RequestException $e) {
        }


        $materias = Subject::all();

        return view('trabalhe-conosco', compact('estados', 'materias'));
    }

    public function candidatarSe(Request $request)
    {

        $candidatura = Candidatura::create([
            'nome' => $request->name,
            'email' => $request->email,
            'cidade' => $request->city,
            'estado' => $request->estado,
            'nascimento' => $request->birthday,
            'whats' => $request->whats,
            'materia' => $request->materia,
            'descricao' => $request->message
        ]);

        if($candidatura){
            return redirect()->route('trabalhe-conosco')->with('success', 'Candidatura enviada com sucesso!');
        } else {
            return redirect()->route('trabalhe-conosco')->with('error', 'Erro ao enviar a candidatura.');
        }
    }

    public function dashboard()
    {

        $mensagens = Message::all();

        return view('authenticated.dashboard', compact('mensagens'));
    }

    public function candidaturas()
    {

        $candidaturas = Candidatura::all();

        foreach($candidaturas as $candidatura){
            $candidatura->materia = Subject::find($candidatura->materia)->nome;
        }

        return view('authenticated.candidaturas', compact('candidaturas'));
    }

    public function getMensagem($id){

        $mensagem = Message::where('id', $id)->first();

        return response()->json($mensagem);
    }

    public function sendMail(Request $request){

        try {

            $mensagem = Message::find($request->id);

            $aluno = $mensagem->aluno;
            $email = $mensagem->email;
            $mensagemAluno = $mensagem->mensagem;
            $professor = Teacher::find($mensagem->professor_id)->nome;
            $mensagemProfessor = $request->resposta;
            Mail::to($email)->send(new MailSender($aluno, $mensagemAluno, $professor, $mensagemProfessor));

            $mensagem->status = false;
            $mensagem->save();

            return response()->json([
                    'success' => true
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function deleteMensagem($id){

        Message::find($id)->delete();

        return true;
    }

    public function deleteCandidatura($id){

        $candidatura = Candidatura::find($id)->delete();

        if($candidatura){
            return redirect()->route('candidaturas');
        } else {
            return redirect()->route('candidaturas')->with('error', 'Erro ao apagar a candidatura. Tente novamente');
        }
    }

}
