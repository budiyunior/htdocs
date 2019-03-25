package com.example.duaaktivitas;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    private static final String LOG_TAG = MainActivity.class.getSimpleName();
    // Unique tag required for the intent extra
    public static final String EXTRA_MESSAGE = "com.example.android.duaaktivitas.extra.MESSAGE";
    // Unique tag for the intent reply
    public static final int TEXT_REQUEST = 1;

    // EditText view for the message
    private EditText mMessageEditText;
    // TextView for the reply header
    private TextView mReplyHeadTextView;
    // TextView for the reply body
    private TextView mReplyTextView;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mMessageEditText = (EditText) findViewById(R.id.editText_main);
        mReplyHeadTextView = (TextView) findViewById(R.id.text_header_reply);
        mReplyTextView = (TextView) findViewById(R.id.text_message_reply);
        Log.d(LOG_TAG,"-------");
        Log.d(LOG_TAG,"onCreate");

        mMessageEditText	=	(EditText)	findViewById(R.id.editText_main);
        mReplyHeadTextView	=	(TextView)	findViewById(R.id.text_header_reply);
        mReplyTextView	=	(TextView)	findViewById(R.id.text_message_reply);


        if	(savedInstanceState	!=	null) {
            boolean isVisible = savedInstanceState.getBoolean("reply_visible");

            if (isVisible) {
                mReplyHeadTextView.setVisibility(View.VISIBLE);
                mReplyTextView.setText(savedInstanceState.getString("reply_text"));
                mReplyTextView.setVisibility(View.VISIBLE);
            }
        }
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

    public void launchSecondActivity(View view) {
        Log.d(LOG_TAG, "Button clicked!");

        Intent intent = new Intent(this, SecondActivity.class);
        String message = mMessageEditText.getText().toString();

        intent.putExtra(EXTRA_MESSAGE, message);
        startActivityForResult(intent, TEXT_REQUEST);
    }
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        // Test for the right intent reply
        if (requestCode == TEXT_REQUEST) {
            // Test to make sure the intent reply result was good.
            if (resultCode == RESULT_OK) {
                String reply = data.getStringExtra(SecondActivity.EXTRA_REPLY);

                // Make the reply head visible.
                mReplyHeadTextView.setVisibility(View.VISIBLE);

                // Set the reply and make it visible.
                mReplyTextView.setText(reply);
                mReplyTextView.setVisibility(View.VISIBLE);
            }
        }
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);

        if (mReplyHeadTextView.getVisibility() == View.VISIBLE) {
            outState.putBoolean("reply_visible", true);
            outState.putString("reply_text",
                    mReplyTextView.getText().toString());
        }
    }
}
