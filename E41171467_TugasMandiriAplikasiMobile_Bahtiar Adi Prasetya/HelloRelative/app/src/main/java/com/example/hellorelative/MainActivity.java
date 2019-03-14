package com.example.hellorelative;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.example.hellorelative.R;

public class MainActivity extends AppCompatActivity {
private int mCount = 0;
private int a = 10;
private int b = 10;
private TextView mShowCount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mShowCount	=	(TextView)	findViewById(R.id.show_count);
    }
    public void showToast(View view) {
//        Toast	toast	=	Toast.makeText(this,	R.string.toast_message,	Toast.LENGTH_LONG);
        Toast	toast	=	Toast.makeText(this,	"Data = "+mCount+"",	Toast.LENGTH_LONG);

        toast.show();

    }
    public void countUp(View view) {
        mCount++;
        if(mCount == b) {
            Log.d("MainActivity", "Angka = "+mCount+"");
            Toast	toast	=	Toast.makeText(this,	"Data = "+mCount+"",	Toast.LENGTH_LONG);
            toast.show();
            b+=a;
        }
        if	(mShowCount	!=	null);
        mShowCount.setText(Integer.toString(mCount));
    }

    public void reset(View view) {
        mCount = 0;
        if	(mShowCount	!=	null);
        mShowCount.setText(Integer.toString(mCount));
    }
}
