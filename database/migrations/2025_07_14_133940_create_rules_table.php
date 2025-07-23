    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('rules', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('disease_id')->nullable();
                $table->unsignedBigInteger('gejala_id')->nullable(); 
                // $table->decimal('CF_pakar', 5, 3);
                $table->float('cf_pakar')->nullable(false);
                $table->timestamps();

                $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
                $table->foreign('gejala_id')->references('id')->on('gejalas')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('rules');
        }
    };
