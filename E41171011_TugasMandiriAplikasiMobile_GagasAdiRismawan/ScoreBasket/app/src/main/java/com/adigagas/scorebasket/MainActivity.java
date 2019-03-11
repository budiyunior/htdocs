package com.adigagas.scorebasket;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    int scoreTeamA = 0, scoreTeamB = 0, foulTeamA = 0, foulTeamB = 0;

    Button twoPointA, twoPointB, threePointA, threePointB, foulA, foulB, reset, game;
    TextView scoreA, scoreB, countFoulA, countFoulB;
    Context context;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        context = this;

        twoPointA = (Button)findViewById(R.id.buttonP2TeamA);
        twoPointB = (Button)findViewById(R.id.buttonP2TeamB);
        threePointA = (Button)findViewById(R.id.buttonP3TeamA);
        threePointB = (Button)findViewById(R.id.buttonP3TeamB);
        foulA = (Button)findViewById(R.id.buttonFoulTeamA);
        foulB = (Button)findViewById(R.id.buttonFoulTeamB);
        reset = (Button)findViewById(R.id.buttonReset);
        game = (Button) findViewById(R.id.buttonGame);
        scoreA = (TextView)findViewById(R.id.scoreTeamA);
        scoreB = (TextView)findViewById(R.id.scoreTeamB);
        countFoulA = (TextView)findViewById(R.id.foulA);
        countFoulB = (TextView)findViewById(R.id.foulB);

        scoreA.setText("" + scoreTeamA);
        scoreB.setText("" + scoreTeamB);
        countFoulA.setText("" + foulTeamA);
        countFoulB.setText("" + foulTeamB);

        twoPointA.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                scoreTeamA = scoreTeamA + 2;
                scoreA.setText("" + scoreTeamA);

                Toast toast = Toast.makeText(context, "Team A 2 Point", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        threePointA.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                scoreTeamA = scoreTeamA + 3;
                scoreA.setText("" + scoreTeamA);

                Toast toast = Toast.makeText(context, "Team A 3 Point", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        twoPointB.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                scoreTeamB = scoreTeamB + 2;
                scoreB.setText("" + scoreTeamB);

                Toast toast = Toast.makeText(context, "Team B 2 Point", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        threePointB.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                scoreTeamB = scoreTeamB + 3;
                scoreB.setText("" + scoreTeamB);

                Toast toast = Toast.makeText(context, "Team B 3 Point", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        foulA.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                foulTeamA = foulTeamA + 1;
                countFoulA.setText("" + foulTeamA);

                Toast toast = Toast.makeText(context, "Team A Foul", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        foulB.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){
                foulTeamB = foulTeamB + 1;
                countFoulB.setText("" + foulTeamB);

                Toast toast = Toast.makeText(context, "Team B Foul", Toast.LENGTH_SHORT);
                toast.show();

            }
        });

        game.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){

                if (scoreTeamA == scoreTeamB) {
                    Toast toast = Toast.makeText(context, "MATCH DRAW", Toast.LENGTH_SHORT);
                    toast.show();
                } else {
                    if (scoreTeamA > scoreTeamB) {
                        Toast toast = Toast.makeText(context, "TEAM A WIN", Toast.LENGTH_SHORT);
                        toast.show();
                    } else {
                        Toast toast = Toast.makeText(context, "TEAM B WIN", Toast.LENGTH_SHORT);
                        toast.show();
                    }
                }

                scoreTeamA = 0;
                scoreTeamB = 0;
                foulTeamA = 0;
                foulTeamB = 0;

                scoreA.setText("" + scoreTeamA);
                scoreB.setText("" + scoreTeamB);
                countFoulA.setText("" + foulTeamA);
                countFoulB.setText("" + foulTeamB);

            }
        });

        reset.setOnClickListener(new View.OnClickListener(){

            public void onClick(View v){

                scoreTeamA = 0;
                scoreTeamB = 0;
                foulTeamA = 0;
                foulTeamB = 0;

                scoreA.setText("" + scoreTeamA);
                scoreB.setText("" + scoreTeamB);
                countFoulA.setText("" + foulTeamA);
                countFoulB.setText("" + foulTeamB);

                Toast toast = Toast.makeText(context, "SCORE RESET", Toast.LENGTH_SHORT);
                toast.show();

            }
        });
    }
}
