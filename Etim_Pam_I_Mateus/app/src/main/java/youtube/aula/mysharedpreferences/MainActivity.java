package youtube.aula.mysharedpreferences;

import android.annotation.SuppressLint;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import androidx.graphics.shapes.Feature;

import java.nio.Buffer;

public class MainActivity extends AppCompatActivity {

    Button btnGravar,btnApresentar;
    EditText edtNome,edtIdade,edtTelefone;
    TextView tvInfo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContenView(R.layout.activity_main);

        btnGravar = findViewById(R.id.btnGravar);
        btnApresentar = findViewById(R.id.btnApresentar);
        edtNome = findViewById(R.id.edtNome);
        edtIdade = findViewById(R.id.edtIdade);
        edtTelefone = findViewById(R.id.edtTelefone);
        tvInfo = findViewById(R.id.tvInfo);

        edtNome.requestFocus();

        btnGravar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedPreferences prefs = getSharedPreferences("chaveGeral", MODE_PRIVATE);
                SharedPreferences.Editor editor = prefs.edit();
                editor.putString("chaveNome", edtNome.getText().toString());
                editor.putString("caveIdade", edtIdade.getText().toString());
                editor.putString("chaveTelefone",edtTelefone.getText().toString());
                editor.commit();
                Toast.makeText(MainActivity.this,"Gravado com Sucesso",Toast.LENGTH_SHORT).show();

            }
        });

        btnApresentar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String nome,idade,telefone;
                SharedPreferences prefs = getSharedPreferences("chavegeral",MODE_PRIVATE);

                nome=prefs.getString("chaveNome","");
                idade=prefs.getString("chaveIdade","");
                telefone=prefs.getString("chaveTelefone","");

                tvInfo.setText(nome+"\n"+idade+"\n"+telefone);
            }
        });
    }
}