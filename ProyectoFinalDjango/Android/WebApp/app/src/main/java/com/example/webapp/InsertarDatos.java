package com.example.webapp;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class InsertarDatos extends AppCompatActivity {
    EditText txtNombre, txtApellido, txtCedula, txtDireccion, txtTelefono;
    Button insertarDatos;
    RequestQueue requestQueue;
    private static final String URL = "https://my-json-server.typicode.com/Elvislml/Repositorylml_Elvis/user";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insertar_datos);

        requestQueue = Volley.newRequestQueue(this);
        txtNombre = findViewById(R.id.txtNombreVolly);
        txtApellido = findViewById(R.id.txtApellidoVolly);
        txtCedula = findViewById(R.id.txtCedulaVolly);
        txtDireccion = findViewById(R.id.txtDireccionVolly);
        txtTelefono = findViewById(R.id.txtTelefonoVolly);
        insertarDatos = findViewById(R.id.btnInsertarVolly);

        insertarDatos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                registrarUsuario();
            }
        });


    }


    private void registrarUsuario(){
        final ProgressDialog loading = new ProgressDialog(InsertarDatos.this);
        loading.setMessage("Pro faavor espere...");
        loading.setCanceledOnTouchOutside(false);
        loading.show();

        JSONObject object = new JSONObject();
        try {
            object.put("nombre", txtNombre.getText());
            object.put("apellido", txtApellido.getText());
        }catch (JSONException e){
            e.printStackTrace();
        }

        JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(
                Request.Method.POST,
                URL,
                object,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Toast.makeText(getApplicationContext(), response.toString(), Toast.LENGTH_LONG).show();
                        try {
                            Log.d("JSON", String.valueOf(response));
                            loading.dismiss();
                            String Error = response.getString("httpStatus");
                            if (Error.equals("") || Error.equals(null)) {

                            } else {

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            loading.dismiss();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        loading.dismiss();
                    }
                }
        );
    }

}




































