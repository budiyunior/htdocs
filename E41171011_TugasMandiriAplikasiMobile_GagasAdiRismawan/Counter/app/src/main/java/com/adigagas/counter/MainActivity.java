package com.adigagas.counter;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    int counter = 0;

    Button count, toast, reset;
    TextView nilai;
    Context context;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        context = this;

        count = (Button)findViewById(R.id.btnCount);
        toast = (Button)findViewById(R.id.btnToast);
        reset = (Button)findViewById(R.id.btnReset);
        nilai  = (TextView)findViewById(R.id.textNilai);

        nilai.setText("" + counter);

        count.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                counter++;
                nilai.setText("" + counter);

                if (counter % 10 == 0) {
                    Toast toast = Toast.makeText(context, "data ke=" + counter, Toast.LENGTH_SHORT);
                    toast.show();
                }
            }
        });

        reset.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                counter=0;
                nilai.setText("" + counter);
            }
        });

        toast.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                Toast toast = Toast.makeText(context, (R.string.toast_message), Toast.LENGTH_SHORT);
                toast.show();
            }

        });
    }
}
