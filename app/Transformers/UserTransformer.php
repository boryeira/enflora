<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'nombre' => (string)$user->first_name,
            'apellido' => (string)$user->last_name,
            'correo' => (string)$user->email,
            'fechaNacimiento' => (string)$user->birthdate,
            'genero' => (string)$user->gender,
            'telefono' => (int)$user->phone,
            'direccion' => (string)$user->address,
            'contactoEmergencia' => (int)$user->emergency_id,
            'estadoUsuario' => (int)$user->status_user_id,
            'tutorial' => (boolean)$user->tutorial,
            'fechaCreacion' => (string)$user->created_at,
            'fechaActualizacion' => (string)$user->updated_at,
            'fechaEliminacion' => isset($user->deleted_at) ? (string) $user->deleted_at : null,
            'avatar' => $user->avatar,

            'rels' => [
                'self' => [
                    'href' => route('users.show', $user->id),
                ],
            ],
        ];
    }
}
