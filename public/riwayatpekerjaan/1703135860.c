#ifdef __APPLE__
#include <GLUT/glut.h>
#else
#include <GL/glut.h>
#endif

#include <stdlib.h>

GLfloat rotationAngle = 0.0f;  // Variabel untuk menyimpan sudut rotasi

// Fungsi untuk menggambar objek
void display() {
    glClearColor(1, 1, 1, 1);
    glClear(GL_COLOR_BUFFER_BIT);

    glLoadIdentity();  // Reset transformasi matriks

    // Terapkan rotasi pada objek
    glRotatef(rotationAngle, 0.0f, 0.0f, 1.0f);

    // Gambar objek (misalnya, sebuah kotak)
    glBegin(GL_QUADS);
    glColor3f(0, 1, 0);  // Warna hijau
    glVertex2f(-0.1, -0.1);
    glVertex2f(0.1, -0.1);
    glVertex2f(0.1, 0.1);
    glVertex2f(-0.1, 0.1);
    glEnd();

    glFlush();
}

// Fungsi untuk mengupdate sudut rotasi objek
void update(int value) {
    rotationAngle += 1.0f;  // Ganti sesuai kecepatan rotasi yang diinginkan
    if (rotationAngle > 360) {
        rotationAngle -= 360;  // Atur agar sudut rotasi tetap dalam rentang 0-360 derajat
    }
    glutPostRedisplay();  // Panggil display function
    glutTimerFunc(16, update, 0);  // Atur ulang timer
}

int main(int argc, char** argv) {
    glutInit(&argc, argv);
    glutInitWindowSize(640, 500);
    glutInitWindowPosition(100, 100);
    glutCreateWindow("Objek Berputar");
    glutDisplayFunc(display);
    glutTimerFunc(25, update, 0);  // Panggil fungsi update setiap 25 milidetik
    glutMainLoop();
    return 0;
}
