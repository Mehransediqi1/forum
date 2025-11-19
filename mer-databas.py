from flask import Flask, render_template, request, redirect, url_for
import mysql.connector

app = Flask(__name__)

# --- Databasuppkoppling ---
def get_connection(host="localhost", user="root", password="", database="test"):
    return mysql.connector.connect(
        host=host,
        user=user,
        password=password,
        database=database
    )

# --- Huvudsida / Läs elever ---
@app.route('/')
@app.route('/read')
def read():
    db = get_connection()
    cursor = db.cursor(dictionary=True)
    cursor.execute("SELECT * FROM students")
    students = cursor.fetchall()
    return render_template('read.html', students=students)

# --- Skriv till databas ---
@app.route('/write', methods=['GET', 'POST'])
def write_form():
    if request.method == 'GET':
        return render_template('write.html')

    # POST – spara elev
    fornamn = request.form.get('fornamn', '')
    efternamn = request.form.get('efternamn', '')
    klass = request.form.get('klass', '')

    db = get_connection()
    cursor = db.cursor()

    sql = "INSERT INTO students (fornamn, efternamn, klass) VALUES (%s, %s, %s)"
    val = (fornamn, efternamn, klass)

    cursor.execute(sql, val)
    db.commit()

    return redirect(url_for('confirm'))

# --- Bekräftelse ---
@app.route('/confirm')
def confirm():
    return render_template('confirm.html')


if __name__ == "__main__":
    app.run(debug=True)
