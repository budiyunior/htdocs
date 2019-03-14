package com.example.user.hellotoast;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Context;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;


public class MainActivity extends AppCompatActivity {

    int counter;

    Button tambah, reset;
    TextView nilai;
    Context context;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        context = this;

        tambah = (Button)findViewById(R.id.button_count);
        reset  = (Button)findViewById(R.id.button_toast);
        nilai  = (TextView)findViewById(R.id.show_count);
        nilai.setText("" + counter);

        tambah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                counter++;
                nilai.setText(""+counter);
            }
        });

        reset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                counter=0;
                nilai.setText(""+counter);
            }
        });
    }
}
