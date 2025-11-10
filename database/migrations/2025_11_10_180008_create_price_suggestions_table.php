use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('price_suggestions', function (Blueprint $table) {
            $table->bigIncrements('suggestion_id');
            $table->string('version_id'); // FK to ml_model_versions.version_name
            $table->unsignedBigInteger('produce_id');
            $table->timestamp('generated_on')->useCurrent();
            $table->decimal('suggested_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('version_id')->references('version_name')->on('ml_model_versions')->cascadeOnDelete();
            $table->foreign('produce_id')->references('produce_id')->on('produces')->cascadeOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('price_suggestions');
    }
};
