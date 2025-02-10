<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetController extends Controller
{
    public function index()
    {
        $shhet = Sheets::spreadsheet('1VfjfLGc5BNjLUU7b5MjQbMa8uuoa4sa7SjnUD-mP8X8')->sheet('Demo')->get();
        
        $header = $shhet->pull(0);
        $values = Sheets::collection(header: $header, rows: $shhet);
        $data = array_values($values->toArray());
        $fullNames = $data[0]["Nombres"];
        $fullLastName = $data[0]["Apellidos"];
        // Dividimos el nombre completo en un arreglo utilizando el espacio como delimitador
        $nombresSeparados = explode(" ", $fullNames);
        $apellidosSeparados = explode(" ", $fullLastName);

        // Asignamos los nombres a variables individuales
        $firstName = $nombresSeparados[0]; // "Juan"
        $middleName = isset($nombresSeparados[1]) ? $nombresSeparados[1] : ''; // "Carlos" (o una cadena vacía si no hay segundo nombre)

        $lastName = $apellidosSeparados[0]; // "Perez"
        $secondLastName = isset($apellidosSeparados[1]) ? $apellidosSeparados[1] : ''; // "Gomez" (o una cadena vacía si no hay segundo apellido)
        // Visualizamos los resultados
        $unique_code = $data[0]["Docs"];
        $position = $data[0]["Position"];
        $universidad = $data[0]["Universidad"];
        $carrera = $data[0]["Carrera"];
        $correo_code = $data[0]["Correo Code"];
        $biography = $data[0]["Biography"];
        $cedula = $data[0]["Cédula"];
        $github = $data[0]["GitHub"];
        $direccion = $data[0]["Dirección"];
        $camiseta = $data[0]["Camiseta"];
        $correo = $data[0]["Gmail"];
        $celular = $data[0]["Celular"];
        // dd($data[21]);
        // dd($unique_code, $position, $universidad, $carrera, $correo_code, $biography, $cedula, $direccion, $camiseta, $correo, $celular);
        
        $already_exists = User::where('email', $correo)->exists();
        // dd($already_exists, $birth_date);


        if (!$already_exists) {
            $user = User::create([
                'unique_code' => $unique_code,
                'name' => $firstName,
                'email' => $correo,
                'password' => bcrypt('123456'),
                'role_id' => $position == '' ? 5 : 2,
                'group_id' => 1,
            ]);

            $user->details()->create([
                'github_username' => $github,
                'biography' => $biography,
                'staff_email' => $correo_code
            ]);

            $user->info()->create([
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'second_last_name' => $secondLastName,
                'identification_number' => $cedula,
                'institution_name' => $universidad,
                'birth_date' => $this->extraerFechaFormateada($cedula) ?? null,
                'institution_address' => $universidad,
                'education_level' => "Universidad",
                'career' => $carrera,
                'residence' => $direccion,
                'tshirt_size' => $camiseta,
                'phone' => $celular,
            ]);
        }else{
            dd('El usuario ya existe');
        }
        
    }

    public function extraerFechaFormateada($cadena) {
        // Extraer los dígitos entre guiones
        preg_match('/\d{6}/', $cadena, $matches);
    
        if (count($matches) > 0) {
            $fecha_extraida = $matches[0];
    
            // Extraer día, mes y año
            $dia = substr($fecha_extraida, 0, 2);
            $mes = substr($fecha_extraida, 2, 2);
            $anio = substr($fecha_extraida, 4, 2);
    
            // Ajustar el año según el rango
            if ($anio >= 60 && $anio <= 99) {
                $anio = '19' . $anio;
            } elseif ($anio >= 00 && $anio <= 35) {
                $anio = '20' . $anio;
            } else {
                return 'Año inválido';
            }
    
            // Crear un objeto Carbon y formatear la fecha
            $fecha_carbon = Carbon::createFromDate($anio, $mes, $dia);
            return $fecha_carbon->format('Y-m-d'); // Puedes cambiar el formato según tus necesidades
        } else {
            return 'Fecha no encontrada';
        }
    }
}
