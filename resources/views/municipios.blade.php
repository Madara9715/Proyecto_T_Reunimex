
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      </head>
      <body>
          <h1>Municipios</h1>
        <div class="container table-responsive-sm">        
            <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <th>Clave</th>
                  <th>Nombre</th>
                
                </tr>
              </thead>
              <tbody>
                  @foreach ($municipios as $municipio)
                  <tr>
                      <td>{{$municipio->clave}}</td>
                      <td>{{$municipio->nombre}}</td>
                      
                    </tr>
                 @endforeach
              </tbody>
            </table>
            <ul class="pagination justify-content-center" style="margin:20px 0">
             
              </ul>
           
          </div>
          {{ $municipios->links() }}
                    
      </body>
      </html>
      