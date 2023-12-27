<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    </style>
</head>
<body>
    <div style="text-align: center;">
        <a href="https://caroljorginodev.com.br/projetos/brasatecnologia">
            <img src="{{ asset('img/logo.png') }}" alt="Brasa Tecnologia">
        </a>
    </div>

    <div style="padding: 20px;">
        <h2>Olá, {{ $aluno }}, tudo bem?</h2>

        <p>Este é um e-mail de resposta para sua mensagem enviada em nosso portal de Professores!

        <p>Essa foi a sua mensagem:</p>

        <p>{{ $mensagem }}</p>

        <hr>

        <p>O professor {{ $professor }} respondeu o seguinte:</p>

        <p>{{ $mensagemProfessor }}</p>

        <hr>

        <p>Caso tenha ficado com mais alguma dúvida, não deixe de mandar uma nova mensagem! 🙂</p>

        <p>Abraços,</p>
        <p>Equipe Brasa Tecnologia</p>
    </div>

    <div style="background-color: #F0F0F0; padding: 20px; text-align: center;">
        <p>Brasa Tecnologia</p>
    </div>

</body>
</html>
