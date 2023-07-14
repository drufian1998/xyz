use PHPUnit\Framework\TestCase;

class MiCodigoTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $this->conn = new mysqli("localhost", "root", "", "usuarios");
    }

    protected function tearDown(): void
    {
        $this->conn->close();
    }

    public function testConexionBaseDeDatos()
    {
        $this->assertInstanceOf(mysqli::class, $this->conn);
        $this->assertFalse($this->conn->connect_error);
    }

    public function testInsercionUsuario()
    {
        $nombre = "Juan";
        $email = "juan@example.com";
        $password = "secreto";

        $sql = "INSERT INTO usuarios_table (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        $result = $this->conn->query($sql);

        $this->assertTrue($result);
    }
}
