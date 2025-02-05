<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- JavaScript Bootstrap 5 avec Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Traducteur Laravel</h1>
    
    <form action="/traduction" method="post">
        @csrf
        <div class="row">
            <!-- Sélection des langues -->
            <div class="col-md-6">
                <select class="form-select mb-3" name="sourceLanguage">
                    <option selected>{{isset($langue) ? $langue : 'en'}}</option>
                    <option value="en">Anglais</option>
                    <option value="fr">Français</option>
                    <option value="es">Espagnol</option>
                    <option value="ru">Russe</option>
                    <option value="zh">Chinois</option>
                    <option value="ko">Coréen</option>
                    <option value="ar">Arabe</option>
                    <option value="tr">Turc</option>
                    <option value="fi">Suédois</option>
                    <option value="pl">Polonais</option>
                    <option value="cs">Tchèque</option>
                    <option value="hu">Hongrois</option>
                    <option value="sv">Suédois</option>
                    <option value="da">Danois</option>
                    <option value="no">Norvégien</option>
                    <option value="pt">Portugais</option>
                    <option value="es">Espagnol</option>
                    <option value="de">Allemand</option>
                    <option value="it">Italien</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select mb-3" name="targetLanguage">
                    <option selected>{{isset($langue) ? $langue : 'fr'}}{{old('targetLanguage')}}</option>
                    <option value="fr">Français</option>
                    <option value="nl">Néerlandais</option>
                    <option value="en">Anglais</option>
                    <option value="fr">Français</option>
                    <option value="es">Espagnol</option>
                    <option value="ru">Russe</option>
                    <option value="ru">Russe</option>
                    <option value="zh">Chinois</option>
                    <option value="ko">Coréen</option>
                    <option value="ar">Arabe</option>
                    <option value="tr">Turc</option>
                    <option value="fi">Suédois</option>
                    <option value="pl">Polonais</option>
                    <option value="cs">Tchèque</option>
                    <option value="hu">Hongrois</option>
                    <option value="sv">Suédois</option>
                    <option value="da">Danois</option>
                    <option value="no">Norvégien</option>
                    <option value="pt">Portugais</option>
                    <option value="es">Espagnol</option>
                    <option value="de">Allemand</option>
                    <option value="it">Italien</option>
                </select>
            </div>
        </div>
        <div class="row">
            <!-- Zone de texte source -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="sourceText" style="height: 300px">{{isset($sourceText) ? $sourceText : ''}}</textarea>
                    <label for="sourceText">Texte à traduire</label>
                </div>
            </div>
            
            <!-- Zone de texte cible -->
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="targetText" style="height: 300px" readonly>{{isset($result) ? $result['responseData']['translatedText'] : ''}}</textarea>
                    <label for="targetText">Traduction</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-lg" type="submit" id="translateBtn">Traduire</button>
            </div>
        </div>
    </form>
</div>
    
</body>
</html>
