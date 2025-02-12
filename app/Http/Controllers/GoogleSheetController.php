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
        foreach ($data as $dato) {
            $fullNames = isset($dato["Nombres"]) ? $dato["Nombres"] : '';
            $fullLastName = isset($dato["Apellidos"]) ? $dato["Apellidos"] : '';
        
            // Dividir nombres y apellidos
            $nombresSeparados = explode(" ", $fullNames);
            $apellidosSeparados = explode(" ", $fullLastName);
        
            $firstName = $nombresSeparados[0] ?? '';
            $middleName = $nombresSeparados[1] ?? '';
            $lastName = $apellidosSeparados[0] ?? '';
            $secondLastName = $apellidosSeparados[1] ?? '';
        
            $unique_code = $dato["Docs"] ?? '';
            $position = $dato["Position"] ?? '';
            $universidad = $dato["Universidad"] ?? '';
            $carrera = $dato["Carrera"] ?? '';
            $correo_code = $dato["Correo Code"] ?? '';
            $biography = $dato["Biography"] ?? '';
            $cedula = $dato["Cédula"] ?? '';
            $github = $dato["GitHub"] ?? '';
            $direccion = $dato["Dirección"] ?? '';
            $camiseta = $dato["Camiseta"] ?? '';
            $correo = $dato["Gmail"] ?? '';
            $celular = $dato["Celular"] ?? '';
        
            // Verificar si el usuario ya existe
            if (User::where('email', $correo)->exists()) {
                continue; // Si el usuario ya existe, pasa al siguiente sin detener la ejecución
            }
        
            // Crear usuario
            $user = User::create([
                'unique_code' => $unique_code,
                'name' => $firstName,
                'email' => $correo,
                'password' => bcrypt('123456'),
                'role_id' => empty($position) ? 5 : 2,
                'group_id' => 1,
            ]);
        
            // Crear detalles del usuario
            $user->details()->create([
                'github_username' => $github,
                'biography' => $biography,
                'staff_email' => $correo_code
            ]);
        
            // Crear información adicional del usuario
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
