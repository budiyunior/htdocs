package com.example.duaaktivitas;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class SecondActivity extends AppCompatActivity {

    public static final String EXTRA_REPLY = "com.example.android.duaaktivitas.extra.REPLY";
    private EditText mReply;
    private static  final String LOG_TAG = SecondActivity.class.getSimpleName();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);
        mReply = (EditText) findViewById(R.id.editText_second);

        Intent intent =	getIntent();
        String message = intent.getStringExtra(MainActivity.EXTRA_MESSAGE);
        TextView textView = (TextView) findViewById(R.id.text_message);
        if (textView != null) {
            textView.setText(message);
        }
    }
    public void returnReply(View view) {
        String reply = mReply.getText().toString();

        // Create a new intent for the reply, add the reply message to it as an extra,
        // set the intent result, and close the activity.
        Intent replyIntent = new Intent();
        replyIntent.putExtra(EXTRA_REPLY, reply);
        setResult(RESULT_OK, replyIntent);
        finish();
    }

    @Override
    protected void onStart() {
        super.onStart();
        Log.d(LOG_TAG,"onStart");

    }

    @Override
    protected void onRestart() {
        super.onRestart();
        Log.d(LOG_TAG,"onRestart");
    }

    @Override
    protected void onPostResume() {
        super.onPostResume();
        Log.d(LOG_TAG,"onResume");
    }

    @Override
    protected void onPause() {
        super.onPause();
        Log.d(LOG_TAG,"onPause");
    }

    @Override
    protected void onStop() {
        super.onStop();
        Log.d(LOG_TAG,"onStop");
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        Log.d(LOG_TAG,"onDestroy");
    }
}
