<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Heart Horizon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            padding: 20px;
        }

        .invoice-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 auto;
            max-width: 800px;
        }

        .invoice-header {
            background: linear-gradient(135deg, #6a1b9a, #4a148c);
            color: #fff;
            padding: 30px;
            text-align: center;
            border-bottom: 2px solid #fff;
        }

        .invoice-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .invoice-header p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        .invoice-body {
            padding: 30px;
            background-color: #f8f9fa;
        }

        .company-info {
            text-align: center;
            margin-bottom: 40px;
        }

        .company-logo {
    width: 80px;
    height: 80px;
    background: #000000; /* Background putih solid untuk kontras dengan logo hijau */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    color: #333;
    font-size: 2rem;
    border: 3px solid #e9ecef; /* Border abu-abu terang */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Shadow lebih kuat untuk depth */
}

.company-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
}


        .invoice-details {
            margin-bottom: 40px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-details th {
            background-color: #f8f9fa;
        }

        .total-row {
            font-weight: 700;
            font-size: 1.2rem;
        }

        .invoice-footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 2px solid #ddd;
        }

        .btn-custom {
            background: linear-gradient(135deg, #4a148c, #6a1b9a);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(74, 20, 140, 0.3);
            color: white;
            text-decoration: none;
        }

        .invoice-footer small {
            font-size: 0.8rem;
            color: #6c757d;
        }

        @media print {
            body { background: white !important; }
            .invoice-container { box-shadow: none !important; }
            .btn-custom { display: none !important; }
        }
        /* Loading Animation Styles */
#loadingOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.loading-container {
    background: white;
    padding: 40px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    min-width: 300px;
    animation: pulse 2s ease-in-out infinite;
}

.loading-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid #e0e0e0;
    border-top: 4px solid #00A651;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 16px;
    color: #003319;
    font-weight: 600;
    margin-bottom: 20px;
}

.loading-progress {
    width: 100%;
    height: 6px;
    background: #e0e0e0;
    border-radius: 3px;
    overflow: hidden;
    margin-top: 15px;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #003319, #00A651, #00A651, #003319);
    background-size: 200% 100%;
    animation: progressMove 2s ease-in-out infinite;
    border-radius: 3px;
}

@keyframes progressMove {
    0% {
        transform: translateX(-100%);
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        transform: translateX(100%);
        background-position: 0% 50%;
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 10px 30px rgba(0, 166, 81, 0.2);
    }
    50% {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 166, 81, 0.3);
    }
}

/* Perbaiki style untuk print button */
.print-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: white;
    border: 1px solid #ddd;
    color: #333;
    padding: 12px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 1000;
}

.print-btn:hover {
    background: #f5f5f5;
}

/* Tablet */
@media (max-width: 768px) {
    .print-btn {
        bottom: 15px;
        right: 15px;
        padding: 10px 16px;
        font-size: 13px;
    }
}

/* Mobile */
@media (max-width: 480px) {
    .print-btn {
        bottom: 10px;
        right: 10px;
        padding: 8px 12px;
        font-size: 12px;
        border-radius: 3px;
    }
}



    </style>
</head>
<body>
    <!-- Loading Overlay -->
<div id="loadingOverlay" style="display: none;">
    <div class="loading-container">
        <div class="loading-spinner"></div>
        <div class="loading-text">Sedang memuat invoice...</div>
        <div class="loading-progress">
            <div class="progress-bar"></div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="invoice-container">
            <!-- Header -->
            <div class="invoice-header">
                <button class="print-btn" onclick="downloadPDF()" title="Download Invoice">
                    <i class="fas fa-download"></i> Download PDF
                </button>
                <h1>Invoice</h1>
                <p>Terima kasih atas kepercayaan Anda</p>
            </div>

            <!-- Body -->
            <div class="invoice-body">
                <!-- Company Info -->
                <div class="company-info">
                    <div class="company-logo">
                        <img src="{{ asset('image/newlogo.png') }}" alt="Company Logo" />
                    </div>
                    <h3 class="mb-2">Heart Horizon</h3>
                    <p class="text-muted mb-0">Platform Pembelajaran Online Terdepan</p>
                    <small class="text-muted">www.hearthorizon.com | support@hearthorizon.com</small>
                </div>

                <!-- Invoice Details -->
                <div class="invoice-details">
                    <h5 class="mb-4"><i class="fas fa-info-circle"></i> Detail Transaksi</h5>
                    
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <td>{{ $order_id }}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td><span class="text-success">Pembayaran Berhasil</span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <td>{{ $transaction_date }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>{{ $payment_type }}</td>
                        </tr>
                        <tr class="total-row">
                            <th>Total Pembayaran</th>
                            <td>Rp {{ number_format($amount, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Next Steps -->
                <div class="alert alert-info">
                    <h6><i class="fas fa-lightbulb"></i> Langkah Selanjutnya:</h6>
                    <ul class="mb-0 pl-4">
                        <li>Akses materi pembelajaran di dashboard Anda</li>
                        <li>Bergabung dengan komunitas Heart Horizon</li>
                        <li>Mulai perjalanan belajar Anda hari ini</li>
                        <li>Hubungi support jika ada pertanyaan</li>
                    </ul>
                </div>
            </div>

            <!-- Footer -->
            <div class="invoice-footer">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{ url('dashboard') }}" class="btn btn-custom">
                            <i class="fas fa-home"></i> Ke Dashboard
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="mailto:support@hearthorizon.com" class="btn btn-custom btn-outline-custom">
                            <i class="fas fa-envelope"></i> Hubungi Support
                        </a>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="text-muted">
                    <small>
                        <strong>Heart Horizon</strong> - Transforming Lives Through Education<br>
                        Invoice ini dibuat secara otomatis pada {{ now()->format('d F Y, H:i') }} WIB<br>
                        Untuk pertanyaan, hubungi: <a href="mailto:support@hearthorizon.com">support@hearthorizon.com</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
function showLoading() {
    document.getElementById('loadingOverlay').style.display = 'flex';
}

function hideLoading() {
    document.getElementById('loadingOverlay').style.display = 'none';
}

function downloadPDF() {
    // Tampilkan loading
    showLoading();
    
    // Simulasi delay untuk proses generating PDF
    setTimeout(() => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({format: [210, 400]});
        
        const colors = {
            primary: [0, 51, 26],
            secondary: [34, 85, 51],
            accent: [0, 123, 63],
            success: [0, 166, 81],
            light: [245, 255, 245],
            border: [203, 230, 205]
        };
        
        const margin = 20;
        const pageWidth = doc.internal.pageSize.getWidth();
        const contentWidth = pageWidth - 2 * margin;
        
        // Clean header
        doc.setFillColor(...colors.primary);
        doc.rect(0, 0, pageWidth, 35, 'F');
        
        // Company info
        doc.setTextColor(255, 255, 255);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(18);
        doc.text('HEART HORIZON', margin, 22);
        
        doc.setFont("helvetica", "normal");
        doc.setFontSize(10);
        doc.text('Online Learning Platform', pageWidth - margin, 22, { align: 'right' });
        
        // Invoice title
        doc.setTextColor(...colors.primary);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(24);
        doc.text('INVOICE', margin, 55);
        
        // Invoice details in clean table format
        let yPos = 75;
        
        // Table header
        doc.setFillColor(...colors.light);
        doc.rect(margin, yPos, contentWidth, 15, 'F');
        doc.setDrawColor(...colors.border);
        doc.rect(margin, yPos, contentWidth, 15, 'D');
        
        doc.setTextColor(...colors.primary);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(11);
        doc.text('TRANSACTION DETAILS', margin + 5, yPos + 10);
        
        // Table content
        yPos += 15;
        doc.setFillColor(255, 255, 255);
        doc.rect(margin, yPos, contentWidth, 80, 'FD');
        
        const details = [
            ['Order ID', '{{ $order_id }}'],
            ['Date', '{{ $transaction_date }}'],
            ['Payment Method', '{{ $payment_type }}'],
            ['Status', 'COMPLETED'],
            ['Amount', 'Rp {{ number_format($amount, 0, ",", ".") }}']
        ];
        
        doc.setFont("helvetica", "normal");
        doc.setFontSize(10);
        
        details.forEach((detail, index) => {
            const rowY = yPos + 10 + (index * 15);
            
            if (index > 0) {
                doc.setDrawColor(...colors.border);
                doc.setLineWidth(0.2);
                doc.line(margin + 5, rowY - 5, pageWidth - margin - 5, rowY - 5);
            }
            
            doc.setTextColor(...colors.secondary);
            doc.setFont("helvetica", "bold");
            doc.text(detail[0], margin + 10, rowY);
            
            if (detail[0] === 'Status') {
                doc.setTextColor(...colors.success);
                doc.setFont("helvetica", "bold");
            } else if (detail[0] === 'Amount') {
                doc.setTextColor(...colors.accent);
                doc.setFont("helvetica", "bold");
            } else {
                doc.setTextColor(...colors.primary);
                doc.setFont("helvetica", "normal");
            }
            
            doc.text(detail[1], margin + 80, rowY);
        });
        
        // Payment confirmation section
        yPos = 175;
        doc.setFillColor(...colors.success);
        doc.rect(margin, yPos, contentWidth, 25, 'F');
        
        doc.setTextColor(255, 255, 255);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(12);
        doc.text('PAYMENT CONFIRMED', margin + 10, yPos + 16);
        
        doc.setFont("helvetica", "normal");
        doc.setFontSize(10);
        doc.text('Your transaction has been successfully processed', pageWidth - margin - 10, yPos + 16, { align: 'right' });
        
        // Next steps section
        yPos = 220;
        doc.setTextColor(...colors.primary);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(12);
        doc.text('NEXT STEPS', margin, yPos);
        
        doc.setDrawColor(...colors.border);
        doc.setLineWidth(1);
        doc.line(margin, yPos + 5, pageWidth - margin, yPos + 5);
        
        const steps = [
            'Log in to your Heart Horizon dashboard',
            'Access your purchased course materials',
            'Begin your learning journey immediately',
            'Contact support if you need assistance'
        ];
        
        doc.setFont("helvetica", "normal");
        doc.setFontSize(10);
        doc.setTextColor(...colors.secondary);
        
        steps.forEach((step, index) => {
            doc.text(`${index + 1}. ${step}`, margin + 5, yPos + 20 + (index * 12));
        });
        
        // Contact information
        yPos = 290;
        doc.setFillColor(...colors.light);
        doc.rect(margin, yPos, contentWidth, 35, 'F');
        doc.setDrawColor(...colors.border);
        doc.rect(margin, yPos, contentWidth, 35, 'D');
        
        doc.setTextColor(...colors.primary);
        doc.setFont("helvetica", "bold");
        doc.setFontSize(10);
        doc.text('SUPPORT CONTACT', margin + 10, yPos + 12);
        
        doc.setFont("helvetica", "normal");
        doc.setFontSize(9);
        doc.setTextColor(...colors.secondary);
        doc.text('Email: support@hearthorizon.com', margin + 10, yPos + 22);
        doc.text('Website: www.hearthorizon.com', pageWidth - margin - 10, yPos + 22, { align: 'right' });
        
        // Footer
        yPos = 340;
        doc.setDrawColor(...colors.border);
        doc.setLineWidth(0.5);
        doc.line(margin, yPos, pageWidth - margin, yPos);
        
        doc.setTextColor(...colors.secondary);
        doc.setFont("helvetica", "normal");
        doc.setFontSize(8);
        
        const currentDate = new Date().toLocaleDateString('id-ID', { 
            day: '2-digit', 
            month: '2-digit', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        
        doc.text(`Generated: ${currentDate} WIB`, margin, yPos + 10);
        doc.text('Heart Horizon © 2025', pageWidth - margin, yPos + 10, { align: 'right' });
        
        // Sembunyikan loading sebelum save
        hideLoading();
        
        // Save PDF
        doc.save(`Invoice_{{ $order_id }}.pdf`);
        
    }, 1500); // Delay 1.5 detik untuk efek loading
}

// Automatically ask for download on page load
window.onload = function() {
    setTimeout(function() {
        if(confirm('Apakah Anda ingin mengunduh invoice ini sebagai PDF?')) {
            downloadPDF();
        }
    }, 1000);
}
</script>

</body>
</html>
