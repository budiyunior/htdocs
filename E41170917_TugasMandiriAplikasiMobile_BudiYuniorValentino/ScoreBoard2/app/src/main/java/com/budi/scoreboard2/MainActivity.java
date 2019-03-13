package com.budi.scoreboard2;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity {
    private int a,b = 0;
    private TextView scoreA;
    private TextView scoreB;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        scoreA = (TextView) findViewById(R.id.score_a);
        scoreB = (TextView) findViewById(R.id.score_b);
    }
    public void reset(View view) {
        b = 0;
        if	(scoreB	!=	null);
        scoreB.setText(Integer.toString(b));
        a = 0;
        if	(scoreA	!=	null);
        scoreA.setText(Integer.toString(a));
    }
    public void tambah_A(View view) {
        a++;
        if	(scoreA	!=	null);
        scoreA.setText(Integer.toString(a));
    }
    public void tambahB(View view) {
        b++;
        if	(scoreB	!=	null);
        scoreB.setText(Integer.toString(b));
    }
}
